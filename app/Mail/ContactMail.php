<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $messageContent;

    public function __construct($name, $messageContent)
    {
        $this->name = $name;
        $this->messageContent = $messageContent;
    }

    public function build()
    {
        return $this->subject("New Contact Message from Portfolio")
                    ->view('emails.contact'); // <--- This must match your Blade file
    }
}