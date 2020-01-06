<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentInvitation extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $studioLink;
    private $studio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_name, $_studio, $_studioLink)
    {
        //
        $this->name = $_name;
        $this->studioLink = $_studioLink;
        $this->studio = $_studio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view("mail.student_invitation", ["name" => $this->name, "studio" => $this->studio, "studioLink" => $this->studioLink]);
    }
}
