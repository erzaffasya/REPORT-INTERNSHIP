<?php

namespace Database\Seeders;

use App\Models\Akses_divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AksesDivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Akses_divisi::create([
            'id' => 1,
            'user_id' => 1,
            'divisi_id' => 1,
        ]);
        Akses_divisi::create([
            'id' => 2,
            'user_id' => 2,
            'divisi_id' => 1,
        ]);
        Akses_divisi::create([
            'id' => 3,
            'user_id' => 1,
            'divisi_id' => 2,
        ]);
    }
}
