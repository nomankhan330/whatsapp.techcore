<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        return view('message/send_single_message');
    }

    public function sendBulkMessage(Request $request)
    {
        return view('message/send_bulk_message');
    }
}
