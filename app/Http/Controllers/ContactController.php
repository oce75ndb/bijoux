<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;

class ContactController extends Controller
{
    public function envoyer(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        Mail::to('oceanebondon30@gmail.com')->send(
            new ContactMail(
                $request->input('nom'),
                $request->input('email'),
                $request->input('message')
            )
        );

        return back()->with('success', 'Merci pour votre message 💌');
    }
}
