<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->markdown('emails.verification-email')->with(['email_token' => $this->user->email_token, 'comp' => $this->user->competition->long_name]);
        $is_team = ($this->user->competition_id > 2) ? true : false;
        $captain_name = "";
        if($is_team){
            $captain_name = $this->user->get_captain->first()->full_name;
        }

        $category = "Mahasiswa";
        if($this->user->competition_id < 4){
            $category = "SMA/SMK";
        } elseif ($this->user->competition_id == 4){
            $category = "Mahasiswa/Umum";
        }

        return $this->markdown('emails.verification-email-new')
        ->with(['is_team'=>$is_team, 'category'=>$category, 'captain_name'=>$captain_name]);
    }
}
