<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->longText('senin')->nullable();
            $table->longText('selasa')->nullable();
            $table->longText('rabu')->nullable();
            $table->longText('kamis')->nullable();
            $table->longText('jumat')->nullable();
            $table->longText('mingguan')->nullable();
            $table->longText('komentar')->nullable();
            $table->integer('isVerif')->default(4);
            // Ketentuan isVerif
            // 1 = udah ga revisi atau approve
            // 0 = revisi
            // 4 = baru ke create
            // 2 = mahasiswa ngirim revisi
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("divisi_id")->constrained("divisi")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
};
