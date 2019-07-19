<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function sendEmail(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
            
          ]);
    

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'message'  => $request->message
           );
           
      Mail::send(['text'=>'welcome'],$data, function($message) use ($data) {
                        $message->from( $data['email'] );
                        $message->to('mohamednjikam25@hotmail.com');
                        
                        
                    }
                );


            if( count(Mail::failures()) > 0 ){
            
                $request->session()->flush();  
                return redirect('welcome')->with('error', Lang::get('index.email_not_sent'));
               
                
            }else{
                
                $request->session()->flush();
               
                return redirect('welcome')->with('success', Lang::get('index.email_sent'));
                
            }

     
    }
}