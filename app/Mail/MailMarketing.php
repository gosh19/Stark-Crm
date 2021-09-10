<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailMarketing extends Mailable
{
    use Queueable, SerializesModels;

    public $text = "";
    public $selectedCourses = [];
    public $title ="";

    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $text, $title, $selectedCourses)
    {
        $this->text = $text;
        $this->title = $title;
        $this->selectedCourses = $selectedCourses;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.marketing',['text'=>$this->text,'title'=>$this->title,'selectedCourses'=>$this->selectedCourses]);
    }
}
