<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Template;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MessagesImport;
use App\Models\MessageBulk;
use Illuminate\Support\Facades\DB;
use Datatables;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        $whatsAppNumber = Auth::User()->contact_no;

        $contact = Contact::select('*')->where('contact_status','valid')->get();

        /*$template = Template::select('*')->where([
            'template_status' => 'Approved',
            'user_id' => $userId
        ])->get();*/


        $templates = Template::select('id','template_name')->where('user_id',$userId)->where('template_status','Approved')->get();

        //dd($template);
        return view('message/send_single_message', compact('contact','templates','whatsAppNumber'));
    }

    public function sendBulkMessage(Request $request)
    {

        $userId = Auth::user()->id;
        $whatsAppNumber = Auth::User()->contact_no;

        $templates = Template::select('id','template_name')->where('user_id',$userId)->where(function($query) {
            $query->where('template_status','Approved');
            //->orWhere('email','johndoe@example.com');
        })->get();

        return view('message/send_bulk_message', compact('templates','whatsAppNumber'));
    }

    public function getTemplateData(Request $request)
    {
        //dd($request->id);
        $template = Template::where('id',$request->id)->get();
        $param_counts = substr_count($template[0]->body_text, "{{");

        /*$text = '{This} is a [test] string, [eat] my [shorts]. [shorts][shorts][shorts]';
        preg_match_all("/\{{^\}}*\]/", $text, $matches);
        dd($matches[0]);*/

        preg_match_all('/{{(.*?)}}/', $template[0]->body_text, $matches);
        $params = $matches[0];
        $params = array_values(array_unique($params));

        /*$dataArray=array();

        for ($i=0; $i < count($params); $i++)
        {
            $a = str_replace("{{","",$params[$i]);
            $a = str_replace("}}","",$a);
            //dd($a);

            array_push($dataArray,$a);

        }
        //dd($dataArray);
        $final = array_merge($dataArray,$params);*/

        return response()->json([
            'code' => '200',
            'data' => $template,
            'params'=> $params,
            /*'dataArray'=> $dataArray,
            'finals'=> $final,*/
        ]);
    }

    public function store(Request $request)
    {
        if($request->single_or_bulk == 'bulk')
        {
            $request->validate([
                'template_name' => 'required',
                'broadcast_name' => 'required',
                'file' => 'required|max:10000|mimes:xlsx',
                'scheduled_message_send' => 'required',
                'scheduled_at'=> $request->scheduled_message_send == 'Now' ? 'nullable' : 'required',
            ]);
        }
        else
        {

            $arr = array();
            foreach ($request->all() as $key => $value) {
                if($key != 'param_')
                {
                    $arr[$key] = ['required'];
                }
            }
            $request->validate($arr);
        }
        $userId = Auth::user()->id;
        $whatsAppNumber = Auth::User()->contact_no;
        $template=Template::with('templateCategory','templateLanguage')->where('id',$request->template_name)->get();
        $body=$template[0]->body_text;
        if ($request->hasFile('file')){

            DB::beginTransaction();
            $messageBulk=MessageBulk::create([
                "user_id"=>$userId,
                "template_id"=>$request->template_name,
                "template_name"=>$template[0]->template_name,
                "whatsapp_number"=>$whatsAppNumber,
                "broadcast_name"=>$request->broadcast,
                "broadcast_type"=>$request->scheduled_message_send,
                "scheduled_at"=>$request->scheduled_at,
            ]);
            try {
                Excel::import(new MessagesImport($template,$messageBulk->id,$request->broadcast_name), $request->file);
                DB::commit();
            } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                DB::rollBack();
                return response()->json([
                    'code' => '422',
                    'message' => 'Empty parameter',
                    'status' => 'error',
                ]);
            }
            return response()->json([
                'code' => '200',
                'message' => 'Data successfully added',
                'status' => 'success',
            ]);
        }

        foreach ($request->all() as $key => $value) {
            if(str_contains($key, 'key_'))
            {
                $va=explode('key_',$key);
                // $dataKeyArr[$va[1]]=$value;
                $body=str_replace($va[1],$value,$body);
            }
        }
        $headerType=$template[0]->header_type;
        $buttonType=$template[0]->button_type;
        $dataArr=array();
        $dataArr['messaging_product']="whatsapp";
        $dataArr['to']=$request->contact_number;
        $dataArr['type']="template";
        $templateArr=array();
        $templateArr['name']=$template[0]->templateCategory->fullname; // fullname // category
        $langArr=array();
        $langArr['code']=$template[0]->templateLanguage->shortname;
        $langArr['policy']='deterministic';
        $templateArr['language']=$langArr;
        $componentsArr=array();
        if($headerType =='media')
        {
            $componentsArrs=array();
            $componentsArrs['type']='header';
            $parametersArr=array();
            $parametersArr['type']='image';
            $parametersArr['image']=array("link" => "http(s)://the-image-url");
            $new=array();
            array_push($new,$parametersArr);
            $componentsArrs['parameters']=$new;
            array_push($componentsArr,$componentsArrs);
        }
        $componentsArrs=array();
        $componentsArrs['type']='body';
        $parametersArr=array();
        $parametersArr['type']='text';
        $parametersArr['text']=$body;
        $new=array();
        array_push($new,$parametersArr);
        $componentsArrs['parameters']=$new;
        array_push($componentsArr,$componentsArrs);
        if($buttonType == 'quick_reply')
        {
            $ii=0;
            foreach ($template[0]->button_value as $key => $value) {
                $componentsArrs=array();
                $componentsArrs['type']='button';
                $componentsArrs['sub_type']='quick_reply';
                $componentsArrs['index']=$ii;
                $parametersArr=array();
                $parametersArr['type']='text';
                $parametersArr['text']=$value;
                $new=array();
                array_push($new,$parametersArr);
                $componentsArrs['parameters']=$new;
                array_push($componentsArr,$componentsArrs);
                $ii++;
            }
        }
        $templateArr['components']= $componentsArr;

        $dataArr['template']=$templateArr;
        $dataArr=json_encode($dataArr);

        $data = Message::create([
            'user_id' => $userId,
            'template_id'=>$request->template_name,
            'template_name'=>$template[0]->template_name,
            'whatsapp_number' => $whatsAppNumber,
            'contact_number' => $request->contact_number,
            'broadcast_name' => $request->broadcast_name,
            'message_type' => "Template",
            'read_status' => "Delivered",
            'message' => $dataArr,
            'is_sent' => '0',
        ]);
        // button_type
        /*$userId = Auth::user()->id;

        DB::transaction(function () use ($request,$userId) { // Start the transaction
            $contactNumber =$request->country_code.$request->contact_number;
            $data = Contact::create([
                'user_id' => $userId,
                'country_code'=>$request->country_code,
                'contact_name' => $request->contact_name,
                'contact_number' => $contactNumber,
                'contact_status' => 'valid',
            ]);
        }); //

        */
        return response()->json([
            'code' => '200',
            'message' => 'Data successfully added',
            'status' => 'success',
        ]);
    }

    public function viewOutgoingMessages(Request $request)
    {
        if ($request->ajax()) {

            $userId = Auth::user()->id;
            $whatsAppNumber = Auth::User()->contact_no;

            $message = Message::with('template')->where('user_id',$userId)->
            when($request->read_status, function ($query, $status) {
                return $query->where('read_status', $status);
            })->get();

            return Datatables::of($message)
                ->addIndexColumn()
                ->make();
        }

        //dd($message);
        //dd($message[0]->template->template_name);

        return view('message/view_outgoing_messages');
    }
    public function broadcast(Request $request)
    {
        if ($request->ajax()) {
            $userId = Auth::user()->id;
            $data = DB::select(DB::raw("SELECT id,broadcast_name,template_name, 'Single' `type`, '-' scheduled_at FROM messages where user_id = '$userId'
            UNION
            SELECT d.id, d.broadcast_name,d.template_name, 'Scheduled', d.scheduled_at `type`
            FROM messages_bulk d where user_id = '$userId'"));
            return Datatables::of($data)
            ->addColumn('action', function($row) {
                $count=$this->getStatusCountMessage($row->id);
                $btn = '<span class="badge badge-primary"
                style="font-size: 15px;">'.$count[0]->Scheduled.'</span>
            <span class="badge badge-danger" style="font-size: 15px; ">'.$count[0]->Failed.'</span>
            <span class="badge badge-success" style="font-size: 15px; ">'.$count[0]->Sent.'</span>';
                return $btn;
        })
                ->make();
        }
        return view('message/broadcast_index');
    }
    private function getStatusCountMessage($id)
    {
        return DB::select(DB::raw("SELECT
        (SELECT COUNT(1) FROM messages_bulk_details WHERE message_status = 'Scheduled' AND bulk_id = '$id') Scheduled,
        (SELECT COUNT(1) FROM messages_bulk_details WHERE message_status = 'Sent' AND bulk_id = '$id') Sent,
        (SELECT COUNT(1) FROM messages_bulk_details WHERE message_status = 'Failed' AND bulk_id = '$id') Failed"));
    }
}
