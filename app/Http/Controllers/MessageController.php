<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        //dd($params);

        return response()->json([
            'code' => '200',
            'data' => $template,
            'params'=> $params
        ]);
    }
}
