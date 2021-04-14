<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PlanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Feedback to Research Plan from ".$this->details['student'])
            ->view('PlanMailView')
            ->attachData(base64_decode(urldecode($this->details['data'])), "ResearchPlan".preg_replace("/[^a-zA-Z]/", "", $this->details['student']).".pdf", [
                'mime' => 'application/pdf',
            ]);
    }
}
