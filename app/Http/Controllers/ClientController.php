<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ClientRequest;
use App\Models\User;
use Datatables;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        if($request->ajax())
        {
            /*$user = Client::with('user')->whereHas('user', function ($q) {
                $q->where('user_type','2');
            })->get(['name']);*/

            //dd($user);

            $user=Client::with(['user' => function($q)
            {
                $q->where('user_type', '2');
                $q->select('id','name','email','contact_no','profile_picture','last_login');
            }])->get(['user_id','id AS client_id','created_at','contact_person']);
            return Datatables::of($user)
                ->addIndexColumn()
                ->make();

        }
        return view('client/client_index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client/client_create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ClientRequest $request)
    {
        // $request->validate([
        // ]);
        DB::transaction(function () use ($request) { // Start the transaction
            $user=User::create([
                'name' => $request->name,
                'email' => $request->email,
                'user_type' => '2',
                'contact_no' => $request->contact_no,
                'password' => Hash::make($request->password),
            ]);
            $user->attachRole(2);
            $data = Client::create([
                'user_id' => $user->id,
                'client_name' => $request->name,
                'contact_person' => $request->contact_person,
                'address' => $request->address,
                'contact_number' => $request->contact_no,
                'email' => $request->email,
                'status' => '1',
            ]);

        }); //

        return response()->json([
            'code' => '200',
            'message' => 'Data successfully added',
            'status' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('client/client_create',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ClientRequest $request, Client $client)
    {
        //$client=client::find($client->id);
        // $user=user::find($client->user->id);
        $client->client_name= $request->name;
        $client->address= $request->address;
        $client->contact_number= $request->contact_no;
        $client->contact_person= $request->contact_person;
        $client->email= $request->email;

        $client->user->name= $request->name;
        $client->user->email= $request->email;
        $client->user->contact_no= $request->contact_no;
        // $user->name=$request->name;
        // $user->email=$request->email;
        // $user->contact_no=$request->contact_no;
        if($request->password != null)
        {
            $client->user->password=Hash::make($request->password);
        }

        DB::transaction(function () use ($request,$client) {
            $client->save();
            $client->user->save();
            // $user->save();
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
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $client=client::find($id);
        $client->user->delete();
        $client->delete();
        return true;

    }
}
