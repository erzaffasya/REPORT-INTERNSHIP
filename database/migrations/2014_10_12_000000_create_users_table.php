<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',['admin','magang']);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123123'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'erza',
            'email' => 'erza@gmail.com',
            'password' => bcrypt('123123123'),
            'role' => 'magang',
        ]);
        DB::table('users')->insert([
            'name' => 'fasya',
            'email' => 'fasya@gmail.com',
            'password' => bcrypt('123123123'),
            'role' => 'magang',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }

    
};
