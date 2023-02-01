<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageBulk;
use App\Models\MessageBulkDetail;
use Illuminate\Support\Facades\Auth;
use Datatables;

class ScheduledDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $userId = Auth::user()->id;
            $data = MessageBulk::where('user_id',$userId)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make();

        }
        return view('scheduled-detail/scheduled_detail_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, MessageBulk $scheduledDetail)
    {
        if ($request->ajax()) {
            $data = MessageBulkDetail::where('bulk_id',$scheduledDetail->id)->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make();
        }
        return view('scheduled-detail/scheduled_detail_show',compact('scheduledDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MessageBulk $scheduledDetail)
    {
        return view('scheduled-detail/scheduled_detail_edit',compact('scheduledDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MessageBulk $scheduledDetail)
    {
        $scheduledDetail->update($request->all());
        return response()->json([
            'code' => '200',
            'status' => 'success',
            'message' => 'Data successfully updated',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MessageBulk $scheduledDetail)
    {
        MessageBulkDetail::where('bulk_id',$scheduledDetail->id)->delete();
        $scheduledDetail->delete();
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteMessageBulkDetail($id)
    {
        MessageBulkDetail::where('id',$id)->delete();
        return true;
    }
}
