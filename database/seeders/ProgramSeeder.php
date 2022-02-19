<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::create([
            'id' => 1,
            'judul' => 'Kampus Gratis 1',
            'detail' => 'yayayayayayay',
            'periode_mulai' => '2022-02-19',
            'periode_berakhir' => '2022-02-19',
            'status' => 1,
        ]);
        Program::create([
            'id' => 2,
            'judul' => 'Kampus Gratis 2',
            'detail' => 'yayayayayayay',
            'periode_mulai' => '2022-02-19',
            'periode_berakhir' => '2022-02-19',
            'status' => 1,
        ]);
        Program::create([
            'id' => 3,
            'judul' => 'Kampus Bayar',
            'detail' => 'yayayayayayay',
            'periode_mulai' => '2022-02-19',
            'periode_berakhir' => '2022-02-19',
            'status' => 0,
        ]);
        
    }
}
