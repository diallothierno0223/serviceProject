<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    function create(){
        return view('home.contact'); 
    }

    function envoyer(){
        $data = request()->validate([
            'first_name' => "required|min:3",
            'last_name' => "required|min:3",
            'email' => "required|email",
            'phone' => "required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8",
            'comments' => "required",
        ]);

        Mail::to("diallomamadoucellou206@gmail.com")->send(new ContactMail($data));

        return back()->with("success", "votre message a bien ete envoyer");
    }
}
