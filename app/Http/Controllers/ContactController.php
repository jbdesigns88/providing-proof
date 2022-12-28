<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
use App\Mail\MyEmail;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{


    public function sendMail(Request $request){
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);
        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }


        // Send the email
        $name = request('fullname');
        $subject = " $name Contacting providing proof";
        $data = $request->all();
        $email = new MyEmail($data);
        $email->to(config('mail.email.visitor.to'));
        $email->from(config('mail.email.visitor.from'));
        $email->subject($subject);

     

        try{
            Mail::send($email);
        }
        catch(Exception $ex){
            Log::error( $ex->getMessage());
            return redirect()->back()->with('Failed', 'your message cannot be sent');
        }
        return redirect()->back()->with('success', 'Your message was sent successfully!');
    }
}
