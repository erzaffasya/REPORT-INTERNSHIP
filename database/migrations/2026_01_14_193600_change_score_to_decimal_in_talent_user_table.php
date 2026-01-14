<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Reset semua score ke 0 dulu
        DB::statement('UPDATE talent_user SET score = 0');
        
        // Ubah score dari integer ke decimal untuk mendukung format 0-1
        DB::statement('ALTER TABLE talent_user MODIFY score DECIMAL(3,2)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE talent_user MODIFY score INT');
    }
};
