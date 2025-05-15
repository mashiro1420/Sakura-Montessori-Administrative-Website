<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command("app:tao-tuan-command")->yearlyOn(12,1,'0:0');
        $schedule->command("app:tao-ky-command")->yearlyOn(6,1,'0:0');
        $schedule->command("app:tao-diem-danh-command")->dailyAt('1:00');
        $schedule->command("app:tao-menu")->weeklyOn(0,'1:00');
        $schedule->command("app:tao-tkb")->weeklyOn(4,'1:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
