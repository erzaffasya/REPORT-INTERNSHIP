<?php

namespace App\Console\Commands;

use App\Models\Divisi;
use App\Models\Laporan;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Console\Command;

class KirimLaporan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laporan_harian';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup database daily';

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
     * @return int
     */
    public function handle()
    {
        $program = Program::all();
        $data = NULL;
        foreach ($program as $item) {
            $date_diff = Carbon::parse($item->periode_mulai)->diffInDays(Carbon::parse($item->periode_berakhir),false) + 1;
            if ($date_diff >= "0") {
                $divisi = Divisi::select('akses_divisi.user_id','akses_divisi.divisi_id','divisi.program_id')->join('akses_divisi','akses_divisi.divisi_id','divisi.id')->where('divisi.program_id',$item->id)->get();
                foreach($divisi as $divisis){
                    Laporan::create([
                        'isVerif' => 4,
                        'user_id' => $divisis->user_id,
                        'divisi_id' => $divisis->divisi_id,
                    ]);
                }
            }
        }
    
    }
}
