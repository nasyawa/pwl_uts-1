<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dokter')->insert([
            ['nama' => 'Dr. Andi', 'id_poli' => 1],
            ['nama' => 'Dr. Budi', 'id_poli' => 2],
            ['nama' => 'Dr. Cindy', 'id_poli' => 3],
            ['nama' => 'Dr. Denny', 'id_poli' => 4],
            ['nama' => 'Dr. Elsa', 'id_poli' => 5],
            ['nama' => 'Dr. Ferry', 'id_poli' => 1],
            ['nama' => 'Dr. Gita', 'id_poli' => 2],
            ['nama' => 'Dr. Hani', 'id_poli' => 3],
            ['nama' => 'Dr. Iwan', 'id_poli' => 4],
            ['nama' => 'Dr. Joko', 'id_poli' => 5],
        ]);
    }
}
