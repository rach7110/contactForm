<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use View;
use App\Mail\ContactForm;

class MessageController extends Controller
{
    public function index() 
    {
        $messages = Message::all();
        
        return View::make('message.index')->with(array('messages' => $messages));
    }

    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'full_name'     => 'required|max:255',
            'email'         => 'required|email|max:255',
            'description'   => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to(URL::previous() . "#contact")->withErrors($validator)->withInput();
        }

        //Store input into database.
        $message = new Message;
        $message->full_name = $request->full_name;
        $message->email = $request->email;
        $message->telephone = $request->telephone;
        $message->description = $request->description;

        if($message->save()) {
            //Send notificaiton email.
            Mail::to('guy-smiley@example.com')->send(new ContactForm($message));
            
            return Redirect::to('/#contact')->with('message', "Your message has been sent!")->with('alert-class', "alert-success");

        }
    }
}
