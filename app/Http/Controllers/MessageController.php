<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Mail;
use View;
use App\Mail\ContactForm;
use App\Http\Requests\StoreContactForm;

class MessageController extends Controller
{
    use RedirectMessagesController;

    public function index() 
    {
        $messages = Message::all();
        
        return View::make('message.index')->with(array('messages' => $messages));
    }

    public function store(StoreContactForm $request) 
    {
        $message = new Message;
        $message->full_name = $request->full_name;
        $message->email = $request->email;
        $message->telephone = $request->telephone;
        $message->description = $request->description;

        if($message->save()) {
            //Send notificaiton email.
            Mail::to('guy-smiley@example.com')->send(new ContactForm($message));
            
            if(count(Mail::failures())) {
                return $this->redirectContactFormWithMailErrorMessage();

            } else {
                return $this->redirectContactFormWithMailSuccessMessage();
            }

        } else {
            return $this->redirectContactFormWithErrorMessage();
        }
    }
}