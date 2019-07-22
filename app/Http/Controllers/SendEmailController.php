<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\EmailValidationRequest;


class SendEmailController extends Controller
{
    public function sendMail(EmailValidationRequest $request) {
      
        $message = $request->message;
        $name = $request->name;
        $email= $request->email;


        Mail::send('test', ['name' => $name, 'email' => $email,'message1'=>$message], function ($message) {

            $message->to('mustafa.akiler@gmail.com');
        });


        if(count(Mail::failures()) > 0){
            
        }else{
            return redirect('/');
        }    
    }
}  


    
