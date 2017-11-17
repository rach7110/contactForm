<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

trait RedirectMessagesController  
{
    protected function redirectContactFormWithMailErrorMessage() 
    {
        return Redirect::to('/#contact')->with('message', "Problem sending your message. Please try again later.")->with('alert-class', "alert-warning");
    }

    protected function redirectContactFormWithMailSuccessMessage()
    {
        return Redirect::to('/#contact')->with('message', "Your message has been sent!")->with('alert-class', "alert-success");
    }

    protected function redirectContactFormWithErrorMessage()
    {
        return Redirect::to('/#contact')->with('message', "There was a problem with our system. Please try again later.")->with('alert-class', "alert-warning");
    }
}