<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Http\Requests\EmailValidationRequest;

class SendEmailController extends Controller
{
    public function sendMail(EmailValidationRequest $request)
    {
        $message = $request->message;
        $name = $request->name;
        $email = $request->email;

        Mail::send('test', ['name' => $name, 'email' => $email, 'message1' => $message], function ($message) {
            $message->to('mohamednjikam25@hotmail.com');
        });

        return redirect('/');
    }
}
