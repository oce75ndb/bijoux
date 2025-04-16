<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nom;
    public $email;
    public $messageContact;

    public function __construct($nom, $email, $messageContact)
    {
        $this->nom = $nom;
        $this->email = $email;
        $this->messageContact = $messageContact;
    }

    public function build()
    {
        return $this->subject('Nouveau message - 🌊✨Océan de Bijoux✨🌊')
                    ->view('emails.contact');
    }
}
