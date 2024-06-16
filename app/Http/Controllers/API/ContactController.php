<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request) {
        $title = $request->title;
        $email = $request->email;
        $message = $request->message;

        $mail = new ContactMail($title, $email, $message);
        Mail::to(env('MAIL_HOST_ADDRESS'))->send($mail);

        return response()->json([
            'statusCode' => 200,
            'message' => 'Send contact successfully',
        ]); 
    }
}
