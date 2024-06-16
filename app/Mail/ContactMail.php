<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private string $title;
    private string $email;
    private string $message;

    public function __construct(string $title, string $email, string $message)
    {
        $this->title = $title;
        $this->email = $email;
        $this->message = $message;
        
    }

    public function build()
    {
        return $this->subject('A Message Form ' . $this->email)->view('mail.contact', ['title' => $this->title, 'content' => $this->message]);
    }
}