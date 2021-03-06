<?php

namespace App\Console;

use App\Console\Commands\AnniversaryWish;
use App\Console\Commands\BirthdayWish;
use App\Console\Commands\InvoiceCalculate;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        InvoiceCalculate::class,
        BirthdayWish::class,
        AnniversaryWish::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->command('invoice:calculate')->dailyAt('12:00');
        $schedule->command('birthday:wish')->dailyAt('10:00');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
