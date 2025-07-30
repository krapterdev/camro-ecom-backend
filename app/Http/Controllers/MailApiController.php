<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMails;

class MailApiController extends Controller
{

    public function sendEmail(Request $request)
    {
        $data = [
            'subject' => 'Inline Email Example',
            'name' => 'Sahil Kumar',
            'message' => 'This email was sent without any view file!',
        ];

        Mail::to('krapter.dev@gmail.com')->send(new SendMails($data));

        return response()->json(['message' => 'Email sent without view successfully']);
    }
}
