<?php
namespace App\mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnswerMail extends Mailable {
    use Queueable, SerializesModels;

    private $title;
    private $content;
    private $token;

    public function __construct($title, $content, $token)
    {
        $this->title = $title;
        $this->content = $content;
        $this->token = $token;
    }

    public function build() {
        return $this->subject(trans('mail.subject'))->view('mail.answer', ['title' => $this->title, 'content' => $this->content, 'token' => $this->token]);
    }
}