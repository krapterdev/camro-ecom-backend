<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEnquiryMail;
use Illuminate\Http\Request;

class ContactController extends Controller
{


public function sendEnquiry(Request $request)
{
    $validated = $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'phone'   => 'required',
        'message' => 'required|string',
    ]);

    
$data = [
    'name' => $request->name,
    'email' => $request->email,
    'message' => $request->message,
];

Mail::to('krapter.dev@gmail.com')->send(new ContactEnquiryMail($data));

    // Send email
 
    return response()->json(['success' => true, 'message' => 'Enquiry sent successfully']);
}

}
