<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMailStudent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $message;
       
    public function __construct(array $message)
    {
        //
       $this->message=$message;
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //   dd( $this->message);
        $message = $this->message;
        // dd($message);
        return $this->from("itagsoutenance@gmail.com")
                    ->view('emails.mail_student',[
                    'date_soutenance'=> $message['date_soutenance'],
                    'heure_soutenance'=> $message['heure_soutenance'],
                    'lib_salle'=> $message['lib_salle'],
                    'etudiant'=> $message['etudiant'],
                  
                                              
                    ]);
                    
    }
}
