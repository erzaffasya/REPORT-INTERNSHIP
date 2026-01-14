<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('talent_user', function (Blueprint $table) {
            // Ubah score dari integer ke decimal untuk mendukung format 0-1
            $table->decimal('score', 3, 2)->change(); // 0.00 - 1.00
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('talent_user', function (Blueprint $table) {
            $table->integer('score')->change();
        });
    }
};
