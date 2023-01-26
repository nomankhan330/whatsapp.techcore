<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MessagesImport;

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
        /*$request->validate([
            'contact_number' => 'required',
            'template_name' => 'required',
            'broadcast_name' => 'required',
        ]);*/

        $userId = Auth::user()->id;
        $whatsAppNumber = Auth::User()->contact_no;

        if ($request->hasFile('file')){
            Excel::import(new MessagesImport, $request->file);
        }
        // $dataKeyArr= array();
        $template=Template::where('id',$request->template_name)->get();
        $body=$template[0]->body_text;
        foreach ($request->all() as $key => $value) {
            if(str_contains($key, 'key_'))
            {
                $va=explode('key_',$key);
                // $dataKeyArr[$va[1]]=$value;
                $body=str_replace($va[1],$value,$body);
            }
        }
        dd($body);

        // $request->merge([
        //     'user_id' => 'khan',
        // ]);



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

        return response()->json([
            'code' => '200',
            'message' => 'Data successfully added',
            'status' => 'success',
        ]);*/
    }
}
