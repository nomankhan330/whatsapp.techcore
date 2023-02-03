<?php

namespace App\Http\Controllers;

use App\Models\ContactGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datatables;

class ContactGroupController extends Controller
{

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = Auth::user()->id;

        if ($request->ajax()) {

            $contactGroup = ContactGroup::where('user_id', $userId)->get();

            return Datatables::of($contactGroup)
                ->addIndexColumn()
                ->make();

        }
        return view('contact-group/contact_group_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact-group/contact_group_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
        ]);
        $request->merge([
            'group_status' => is_null($request->is_active) ?  '0' : '1',
            'user_id' => Auth::User()->id,
        ]);
        $complaint=ContactGroup::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactGroup  $contactGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ContactGroup $contactGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactGroup  $contactGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactGroup $contactGroup)
    {
        return view('contact-group/contact_group_create',compact('contactGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactGroup  $contactGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactGroup $contactGroup)
    {
        $request->validate([
            'fullname' => 'required',
        ]);
        $request->merge([
            'group_status' => is_null($request->is_active) ?  '0' : '1',
        ]);
        $contactGroup->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactGroup  $contactGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactGroup $contactGroup)
    {
        //
    }
}
