<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $address = env('MAIL_FROM_ADDRESS', false);
        $subject = $this->data['subject'];
        $name = $this->data['name'];

      //  dd($this->data);
        return $this->view('emails.users.newuser')
                ->from($address, $name)
                ->replyTo($address, $name)
                ->subject($subject)
                ->with([
                    'newuser' => $this->data['newuser'],
                    'content' => $this->data['content'],
                ]);
    }
}
