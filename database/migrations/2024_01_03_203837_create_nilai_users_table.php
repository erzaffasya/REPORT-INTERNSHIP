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
        Schema::create('nilai_users', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('program_id')->constrained('program')->onDelete('cascade');
            
            $table->string('judul_1')->nullable();
            $table->float('nilai_1')->nullable();
            $table->string('judul_2')->nullable();
            $table->float('nilai_2')->nullable();
            $table->string('judul_3')->nullable();
            $table->float('nilai_3')->nullable();
            $table->string('judul_4')->nullable();
            $table->float('nilai_4')->nullable();
            $table->string('judul_5')->nullable();
            $table->float('nilai_5')->nullable();


            $table->float('nilai_6')->nullable();
            $table->float('nilai_7')->nullable();
            $table->float('nilai_8')->nullable();
            $table->float('nilai_9')->nullable();
            $table->float('nilai_10')->nullable();

            $table->float('rata_rata')->nullable();
            $table->float('total')->nullable();
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
        Schema::dropIfExists('nilai_users');
    }
};
