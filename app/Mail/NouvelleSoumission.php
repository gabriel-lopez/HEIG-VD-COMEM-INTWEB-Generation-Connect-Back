<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NouvelleSoumission extends Mailable
{
    use Queueable, SerializesModels;

    public $acceptation_link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($acceptation_link)
    {
        $this->acceptation_link = $acceptation_link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('welcome');
    }
}
