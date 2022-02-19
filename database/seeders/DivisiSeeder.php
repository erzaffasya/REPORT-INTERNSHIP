<?php

namespace Database\Seeders;

use App\Models\Divisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Divisi::create([
            'id' => 1,
            'nama_divisi' => 'Tim Web',
            'detail' => 'yayayayayayay',
            'status' => 1,
            'program_id' => 1
        ]);
        Divisi::create([
            'id' => 2,
            'nama_divisi' => 'Tim Apps',
            'detail' => 'yayayayayayay',
            'status' => 1,
            'program_id' => 1
        ]);
        Divisi::create([
            'id' => 3,
            'nama_divisi' => 'Tim Web dan Apps',
            'detail' => 'yayayayayayay',
            'status' => 0,
            'program_id' => 2
        ]);
    }
}
