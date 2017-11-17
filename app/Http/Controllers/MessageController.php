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
use App\Http\Requests\StoreContactForm;

class MessageController extends Controller
{
    public function index() 
    {
        $messages = Message::all();
        
        return View::make('message.index')->with(array('messages' => $messages));
    }

    public function store(StoreContactForm $request) 
    {
        //Store input into database.
        $message = new Message;
        $message->full_name = $request->full_name;
        $message->email = $request->email;
        $message->telephone = $request->telephone;
        $message->description = $request->description;

        if($message->save()) {
            //Send notificaiton email.
            Mail::to('guy-smiley@example.com')->send(new ContactForm($message));
            
            if(count(Mail::failures())) {
                return Redirect::to('/#contact')->with('message', "Problem sending your message. Please try again later.")->with('alert-class', "alert-warning");

            } else {
                return Redirect::to('/#contact')->with('message', "Your message has been sent!")->with('alert-class', "alert-success");            
            }

        } else {
                return Redirect::to('/#contact')->with('message', "Problem sending your message. Please try again later.")->with('alert-class', "alert-warning");
        }
    }
}