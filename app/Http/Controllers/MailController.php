<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class MailController extends Controller
{
    //
public function sendContactMail(Request $request){
    $contact_data = [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'message' => $request->input('message'),
    ];

    // List of multiple email recipients
    $recipients = [''];

    // Send email to multiple recipients at once
    Mail::to($recipients)->send(new ContactFormMail($contact_data));

    return redirect()->back()->withSuccess('Email has been sent to multiple recipients!');
}
}