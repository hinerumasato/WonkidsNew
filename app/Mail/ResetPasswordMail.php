<?php

namespace App\mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class ResetPasswordMail extends Mailable {
    use Queueable, SerializesModels;

    private $title;
    private $token;


    public function __construct($title, $token)
    {
        $this->title = $title;
        $this->token = $token;
    }

    public function build() {
        return $this->subject(__('mail.reset.subject'))->view('mail.reset', 
            [
                'title' => $this->title, 
                'token' => $this->token,
                'resetUrl' => env('APP_URL').'/reset-password?token='.$this->token,
            ]
        );
    }

}