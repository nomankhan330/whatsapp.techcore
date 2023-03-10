<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\CountryCode;
use App\Models\ContactGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Datatables;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::user()->hasRole('client')) {
                return $next($request);
            } else {
                return abort(404, 'Not found');
            }
        });
    }

    public function index(Request $request)
    {
        $userId = Auth::user()->id;

        if ($request->ajax()) {
            $contact = Contact::when($request->contact_status, function ($query, $status) {
                return $query->where('contact_status', $status);
            })->where('user_id', $userId)->get();
            return Datatables::of($contact)
                ->addIndexColumn()
                ->make();

        }
        return view('contact/contact_index');
    }

    public function create()
    {
        $userId = Auth::user()->id;
        $contactNo = Auth::User()->contact_no;
        $contactGroup = ContactGroup::where('user_id', $userId)->get();
        $countryCode=CountryCode::select('code')->where('status','1')->orderby('code','ASC')->groupBy('code')->get();
        return view('contact/contact_create',compact('countryCode','contactNo','contactGroup'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'contact_name' => 'required',
            'contact_number' => 'required|regex:/[0-9]/',
            'country_code' => 'required',
        ]);
        $userId = Auth::user()->id;

        DB::transaction(function () use ($request,$userId) { // Start the transaction
            $contactNumber =$request->country_code.$request->contact_number;
            $data = Contact::create([
                'user_id' => $userId,
                'contact_group_id'=>$request->contact_group_id,
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
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $userId = Auth::user()->id;
        $contactNo=Auth::User()->contact_no;
        $contactGroup = ContactGroup::where('user_id', $userId)->get();
        $countryCode=CountryCode::select('code')->where('status','1')->orderby('code','ASC')->groupBy('code')->get();
        return view('contact/contact_create',compact('contact','countryCode','contactNo','contactGroup'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'contact_name' => 'required',
            //'contact_number' => 'required',
        ]);

        DB::transaction(function () use ($request,$contact) {
            $contact->update($request->all());;
        });

        return response()->json([
            'code' => '200',
            'status' => 'success',
            'message' => 'Data successfully updated',
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return true;

    }
}
