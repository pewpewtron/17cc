<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationUploaded extends Mailable
{
    use Queueable, SerializesModels;

    public $verification;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($verification)
    {
        $this->verification = $verification;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $verif = $this->verification;
        $comp = $verif->load(['group', 'group.competition']);
        return $this->subject($comp->group->competition->long_name ." - Verifikasi Peserta")
                ->markdown('emails.emailPanitia');
    }
}
