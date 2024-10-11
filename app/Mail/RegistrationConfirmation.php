<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Clinic;
use Illuminate\Queue\SerializesModels;


class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $clinic;

    public function __construct($clinic)
    {
        $this->clinic = $clinic; 
    }

    public function build()
    {
        return $this->view('mails.confirmation');
                    
    }
}