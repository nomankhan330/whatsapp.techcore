<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use App\Models\CountryCode;
use Illuminate\Http\Request;
use Datatables;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $contact = Contact::when($request->contact_status, function ($query, $status) {
                return $query->where('contact_status', $status);
            })->get();
            return Datatables::of($contact)
                ->addIndexColumn()
                ->make();

        }
        return view('contact/contact_index');
    }

    public function create()
    {
        $countryCode=CountryCode::select('code')->where('status','1')->orderby('code','ASC')->groupBy('code')->get();
        return view('contact/contact_create',compact('countryCode'));
    }
}
