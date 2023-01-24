<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use App\Models\TemplateCategory;
use App\Models\TemplateLanguage;
use App\Models\Template;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TemplateController extends Controller
{

/*//$data=array();
$a = array();
$a['website_button_text'] = 'Visit Us';
$a['type'] = 'Static';
$a['link'] = 'https://webxion.com/';
$a['phone_button_text'] = 'Call us';
$a['phone_number'] = '919888000757';
    //array_push($data,$a);
$json_encode = json_encode($a);
echo "<pre>";
    // print_r($json_encode);
$decode = json_decode($json_encode);
print_r($decode->website_button_text);
//echo $decode[0]->website_button_text;*/

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $userId = Auth::user()->id;
            $template = Template::with(['templateCategory','templateLanguage'])->where('user_id',$userId)->get();
            return Datatables::of($template)
                ->addIndexColumn()
                ->make();


        }
        return view('template/template_index');
    }

    public function create()
    {
        $templateCategory = TemplateCategory::select('*')->where('status','1')->orderby('fullname','ASC')->get();
        $templateLanguage = TemplateLanguage::select('*')->where('status','1')->orderby('fullname','ASC')->get();
        return view('template/template_create', compact('templateCategory','templateLanguage'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'template_name' => 'required',
            'template_category' => 'required',
            'template_language' => 'required',
            'body_text' => 'required|max:1024',
            'footer_text' => 'required|max:60',
            'header_file' => 'nullable|mimes:doc,docx,pdf,zip,rar,jpg,png,jpeg,gif|max:2048',
        ]);

        $userId = Auth::user()->id;

        $headerValue = $request->header_type == "text" ? $request->header_text : "";

        if ($request->hasFile('header_file') && $request->header_type == 'media') {

            //File::delete($companyFile->path);
            $destinationPath = base_path('public/uploads/templates/' . $userId);
            $file = $request->file('header_file');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $size = $file->getSize();
            $file->move($destinationPath, $filename);
            $path = "uploads/templates/" .$userId . "/". $filename;
            $headerValue = $path;

            /*$companyFile['file_name'] = $file->getClientOriginalName();
            $companyFile['size'] = $size;
            $companyFile['path'] = $path;
            $companyFile['ext'] = $file->getClientOriginalExtension();*/
        }

        //dd($header_value);

        $call_to_action = array();
        $quick_reply = array();
        $buttonValue = "";

        if ($request->select_button != null){

            if ($request->select_button == "call_to_action"){
                $call_to_action['website_button_text'] = $request->website_button_text;
                $call_to_action['website_type'] = $request->website_type;
                $call_to_action['website_link'] = $request->website_link;
                $call_to_action['phone_button_text'] = $request->phone_button_text;
                $call_to_action['phone_phone_number'] = $request->phone_phone_number;
                $buttonValue = json_encode($call_to_action);
            }

            if ($request->select_button == "quick_reply"){
                $quick_reply['quick_reply_button_text_1'] = $request->quick_reply_button_text_1;
                $quick_reply['quick_reply_button_text_2'] = $request->quick_reply_button_text_2;
                $quick_reply['quick_reply_button_text_3'] = $request->quick_reply_button_text_3;
                $buttonValue = json_encode($quick_reply);
            }
        }

        DB::transaction(function () use ($request,$userId, $headerValue, $buttonValue) { // Start the transaction
            $data = Template::create([
                'user_id' => $userId,
                'template_name' => $request->template_name,
                'template_category' => $request->template_category,
                'template_language' => $request->template_language,
                'header_type' => $request->header_type,
                'header_value' => $headerValue,
                'body_text' => $request->body_text,
                'footer_text' => $request->footer_text,
                'template_status' => "Approved",
                'button_type' => $request->select_button,
                'button_value' => $buttonValue,
            ]);
        });

        return response()->json([
            'code' => '200',
            'message' => 'Data successfully added',
            'status' => 'success',
        ]);
    }

    public function show(Template $template)
    {
        //dd($template->templateLanguage->shortname);
        //dd($template->button_value->website_button_text);
        return view('template/template_show',compact('template'));
    }

    public function templateVariable()
    {
        return view('template/template_variable');
    }

}
