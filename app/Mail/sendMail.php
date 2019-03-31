<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $MailView  ;
    /**
     * Create a new message instance.
     *
     * @param $AorR
     */
    public function __construct($AorR)
    {
        //
        if($AorR == 0){
            $this->MailView ='mail.rejectedMail';


        }
        if($AorR == 1){
            $this->MailView ='mail.AcceptMail';

        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->MailView );
    }
}
