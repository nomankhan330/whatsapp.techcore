<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use Illuminate\Http\Request;
use Datatables;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $contact = Contact::all();
            return Datatables::of($contact)
                ->addIndexColumn()
                ->make();

        }
        return view('contact/contact_index');
    }

    public function create()
    {
        return view('contact/contact_create');
    }
}
