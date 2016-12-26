<?php

namespace App\Console\Commands;

use App\Invoice;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class InvoiceCalculate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:calculate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculates invoice of Employee based on their expected invoice date';

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
        $today = date('d');
        $users = User::where('expected_day_of_invoice',$today)->get();
        foreach ($users as $user) {
            $invoice = Invoice::generate($user);
            if($invoice){
                Mail::to('kavanpancholi@gmail.com')->send(new \App\Mail\Invoice($invoice));
            }
        }
    }
}
