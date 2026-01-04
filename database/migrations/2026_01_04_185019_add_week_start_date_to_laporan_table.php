<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laporan', function (Blueprint $table) {
            // Tambah kolom week_start_date setelah divisi_id
            $table->date('week_start_date')->nullable()->after('divisi_id');
        });

        // Update existing records: set week_start_date berdasarkan created_at
        DB::table('laporan')->whereNull('week_start_date')->orderBy('id')->chunk(100, function ($records) {
            foreach ($records as $record) {
                $createdAt = Carbon::parse($record->created_at);
                $weekStart = $createdAt->startOfWeek(Carbon::MONDAY)->toDateString();

                DB::table('laporan')
                    ->where('id', $record->id)
                    ->update(['week_start_date' => $weekStart]);
            }
        });

        // Setelah data di-update, tambah unique constraint
        Schema::table('laporan', function (Blueprint $table) {
            // Unique constraint untuk mencegah duplikat
            $table->unique(['user_id', 'divisi_id', 'week_start_date'], 'laporan_unique_week');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('laporan', function (Blueprint $table) {
            $table->dropUnique('laporan_unique_week');
            $table->dropColumn('week_start_date');
        });
    }
};
