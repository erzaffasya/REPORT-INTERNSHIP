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
    protected $signature = 'laporan:create-weekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membuat laporan mingguan untuk semua peserta magang di program aktif';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Memulai pembuatan laporan mingguan...');

        $weekStart = Laporan::getMondayOfWeek();
        $today = Carbon::now();
        $created = 0;
        $skipped = 0;

        // Ambil semua program yang masih aktif
        $programs = Program::where('periode_mulai', '<=', $today)
            ->where('periode_berakhir', '>=', $today)
            ->get();

        if ($programs->isEmpty()) {
            $this->warn('Tidak ada program aktif saat ini.');
            return 0;
        }

        foreach ($programs as $program) {
            $this->info("Processing Program: {$program->judul}");

            // Ambil semua user di divisi program ini
            $members = Divisi::select('akses_divisi.user_id', 'akses_divisi.divisi_id', 'divisi.program_id')
                ->join('akses_divisi', 'akses_divisi.divisi_id', 'divisi.id')
                ->where('divisi.program_id', $program->id)
                ->get();

            foreach ($members as $member) {
                // Gunakan helper method dari model untuk cek dan create
                $laporan = Laporan::createIfNotExists(
                    $member->user_id,
                    $member->divisi_id,
                    $weekStart
                );

                if ($laporan) {
                    $created++;
                    $this->line("  ✓ Created: User {$member->user_id}, Divisi {$member->divisi_id}");
                } else {
                    $skipped++;
                    $this->line("  - Skipped: User {$member->user_id}, Divisi {$member->divisi_id} (sudah ada)");
                }
            }
        }

        $this->newLine();
        $this->info("Selesai! Created: {$created}, Skipped: {$skipped}");

        return 0;
    }
}
