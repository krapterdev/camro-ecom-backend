<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMails;

class MailApiController extends Controller
{
    public function send(Request $request)
    {
        $templateKey = $request->input('template');
        $mailTemplates = config('mail_templates');

        if (!isset($mailTemplates[$templateKey])) {
            return response()->json(['error' => 'Invalid mail template'], 400);
        }

        $emailData = $request->except('template');
        $subject = $mailTemplates[$templateKey]['subject'];
        $view = $mailTemplates[$templateKey]['view'];

        Mail::to('krapter.dev@gmail.com')->send(new SendMails($emailData, $subject, $view));

        return response()->json(['status' => 'Mail Sent Successfully']);
    }
}
