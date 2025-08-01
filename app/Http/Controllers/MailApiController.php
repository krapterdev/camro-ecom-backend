<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMails;

class MailApiController extends Controller
{

    public function send(Request $request)
    {
        $data = $request->only(['name', 'email', 'phone', 'message', 'subject']);
        Mail::to('krapter.dev@gmail.com')->send(new SendMails($data));

        return response()->json(['status' => 'Mail Sent']);
    }
}
