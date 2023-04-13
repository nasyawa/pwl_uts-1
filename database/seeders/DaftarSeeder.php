<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daftar')->insert([
            [
                'id_pasien' => 1,
                'id_dokter' => 1,
                'id_user' => 2,
                'keluhan' => 'Sakit kepala',
            ],
            [
                'id_pasien' => 2,
                'id_dokter' => 2,
                'id_user' => 2,
                'keluhan' => 'Pusing',
            ],
            [
                'id_pasien' => 3,
                'id_dokter' => 3,
                'id_user' => 2,
                'keluhan' => 'Sakit gigi',
            ]
        ]);
    }
}
