<?php

namespace App\Mail;

use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Anniversary extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
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
        $now = new Carbon();
        $joining_date = Carbon::createFromFormat(config('app.date_format'), $this->user->joining_date);
        $years = $now->diffInYears($joining_date);
        return $this->view('emails.anniversary')->with('user',$this->user)->with('years',$years);
    }
}
