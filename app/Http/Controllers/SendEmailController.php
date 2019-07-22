<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function sendEmail(Request $request){


    

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'message'  => $request->message
           );
           
      Mail::send('email',$data, function($message) use ($data) {
                        
                        $message->from( $data['email'],$data['name'] );
                        $message->to('mohamednjikam25@hotmail.com');
                        
                        
                    }
                );


            if( count(Mail::failures()) > 0 ){
            
                $request->session()->flush();  
                dd('didn t sent' );
               
                
            }else{
                
                $request->session()->flush();
               
                dd('sent');
                
            }

     
    }

    
}