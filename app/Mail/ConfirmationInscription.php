<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NouvelleInscription extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $type;

    public function __construct($user, $type)
    {
        $this->user = $user;
        $this->type = $type;
    }

    public function build()
    {
        return $this->view('confirmation_inscription_email');
    }
}
