<?php

namespace App\Console;

use App\Models\Divisi;
use App\Models\Laporan;
use App\Models\Program;
use App\Http\Controllers\ProgramController as tambahjadwal;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $program = Program::all();
        // foreach ($program as $programs) {
        //     $formatted_dt1 = Carbon::parse($programs->periode_mulai);
        //     $formatted_dt2 = Carbon::parse($programs->periode_berakhir);
        //     $date_diff = $formatted_dt1->diffInDays($formatted_dt2);
        //     if ($date_diff >= 0){

        //     }
        // }

        // $schedule->call(function () {
        //     Laporan::create([
        //         'nama_divisi' => '1',
        //         'detail' => '1',
        //         'status' => '1',
        //         'program_id' => 1,
        //     ]);
        // })->everyMinute();

        // $schedule->call(new tambahjadwal)->daily();
        $schedule->command('laporan_harian')->weeklyOn(1, '8:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
