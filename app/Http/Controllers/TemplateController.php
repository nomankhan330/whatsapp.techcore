<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Template;
use Illuminate\Http\Request;
use Datatables;

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
       /* if ($request->ajax()) {
            $contact = Template::all();
            return Datatables::of($contact)
                ->addIndexColumn()
                ->make();

        }*/
        return view('template/template_index');
    }

    public function create()
    {
        return view('template/template_create');
    }

}
