<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ContactFormController;

class ContactFormController extends Controller
{
    
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        $data = request()->validate([

            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',

        ]);

        // Send an email
        Mail::to('xondy77@yahoo.fr')->send(new ContactFormMail($data));

        // session()->flash('message', 'Thank you for your message. We\'ll be in touch.');

        // return redirect('contact');

        return redirect('contact')->with('message', 'Thank you for your message. We\'ll be in touch.');

    }



}
