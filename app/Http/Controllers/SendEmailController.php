<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class SendEmailController extends Controller
{
    public function sendMail(Request $request) {
        $this->validate($request,[
            'message'=>'required',
            'name'=>'required',
            'email'=>'required',

        ]);
        
        //   if ($this->validate->fails()) {
        //     return redirect('test')->withInput()->withErrors($this->validate);
        // }

        $message = $request->message;
        $name = $request->name;
        $email= $request->email;


        Mail::send('test', ['name' => $name, 'email' => $email,'message1'=>$message], function ($message) {

            $message->to('mustafa.akiler@gmail.com');
        });


        if(count(Mail::failures()) > 0){
            dd('fuck you');
        }else{
            return redirect('/');
        }    
    }
}  

    //     $this->apikey = config('apikey');
        

    //     $data = array(
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'message'  => $request->message
    //        );
    //     $this->header = array(
    //         'Authorization: Bearer '.$this->apikey,
    //         'User-Agent: sendgrid/' . $this->version . ';php',
    //         'Accept: application/json'
    //     );   
           
    //   Mail::send('welcome',$data, function($message) use ($data) {
    //         $message->getHeaders()
    //         ->addTextHeader('Custom-Header', $this->header);
    //         $message->from( $data['email'],$data['name'] );
    //         $message->to('mustafa.akiler@gmail.com');
                        
                        
    //                 }
    //             );


    //         if( count(Mail::failures()) > 0 ){
            
    //             $request->session()->flush();  
    //             dd('didn t sent' );
               
                
    //         }else{
                
    //             $request->session()->flush();
               
    //             dd('sent');
                
    //         }

     
    // }

    
