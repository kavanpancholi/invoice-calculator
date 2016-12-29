<?php

namespace App\Console\Commands;

use App\Mail\Anniversary;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AnniversaryWish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'anniversary:wish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Wishes employee on the anniversary with the organization';

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
        $users = User::whereRaw('DAYOFYEAR(curdate()) <= DAYOFYEAR(joining_date) AND DAYOFYEAR(curdate()) + 7 >=  dayofyear(joining_date)')
            ->orderByRaw('DAYOFYEAR(joining_date)')->get();
        foreach ($users as $user){
            Mail::to($user->email)->send(new Anniversary($user));
        }
    }
}
