<?php

namespace App\Http\Controllers;

use App\Mail\SendMailAdmin;
use Exception;
use App\Models\Contact;
use App\Mail\SendMailUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'subject' => 'required',
        ]);
        try {
            Contact::create(
                [
                    "name" => $request->name,
                    "email" =>  $request->email,
                    "phone" => $request->phone,
                    "message" => $request->message,
                    "subject" => $request->message,
                ]
            );

            $data = [
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "message" => $request->message,
                "subject" => $request->message,
            ];

            Mail::to($request->email)->send(new SendMailUser($data));
            Mail::to('support@fanalystacademy.org')->send(new SendMailAdmin($data));

            return redirect()->back()->with(["success" => "Message sent"]);
        } catch (Exception $e) {
            return redirect()->back()->with(["error" => "Oops, there was an error"]);
        }
    }
}
