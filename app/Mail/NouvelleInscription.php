<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NouvelleInscription extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $new_user;
    public $type;

    public function __construct($user, $new_user, $type)
    {
        $this->user = $user;
        $this->new_user = $new_user;
        $this->type = $type;
    }

    public function build()
    {
        return $this->view('nouvelle_inscription_email');
    }
}
