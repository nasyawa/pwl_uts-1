<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('poli')->insert([
            [
                'poli' => 'Poli Jantung',
            ],
            [
                'poli' => 'Poli Gigi',
            ],
            [
                'poli' => 'Poli Mata',
            ],
            [
                'poli' => 'Poli Anak',
            ],
            [
                'poli' => 'Poli Kandungan',
            ],
        ]);
    }
}
