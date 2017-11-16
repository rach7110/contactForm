<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class MessageController extends Controller
{
    public function store(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:255',
            'email'     => 'required|email|max:255',
            'message'   => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to(URL::previous() . "#contact")->withErrors($validator)->withInput();
        }

        //Store input into database.

        //Send notificaiton email with input.
    }
}
