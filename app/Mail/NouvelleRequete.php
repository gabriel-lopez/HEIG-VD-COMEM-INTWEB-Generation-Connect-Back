<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NouvelleRequete extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $request;

    public function __construct($user, $request, $hash)
    {
        $this->user = $user;
        $this->request = $request;
        $this->hash = $hash;
    }

    public function build()
    {
        return $this->view('nouvelle_requete_email');
    }
}
