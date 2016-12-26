<?php

namespace App\Console\Commands;

use App\Mail\Birthday;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class BirthdayWish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthday:wish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Wishes Birthday Greetings on Employees\'s Birthday';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::whereRaw('DAYOFYEAR(curdate()) <= DAYOFYEAR(date_of_birth) AND DAYOFYEAR(curdate()) + 7 >=  dayofyear(date_of_birth)')
                    ->orderByRaw('DAYOFYEAR(date_of_birth)')->get();
        foreach ($users as $user){
            Mail::to($user->email)->send(new Birthday($user));
        }
    }
}
