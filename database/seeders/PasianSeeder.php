<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pasien')->insert([
            [
                'rm' => 'RM001',
                'nama' => 'John Doe',
                'alamat' => '123 Main St',
                'jk' => 'L',
            ],
            [
                'rm' => 'RM002',
                'nama' => 'Jane Doe',
                'alamat' => '456 Elm St',
                'jk' => 'P',
            ],
            [
                'rm' => 'RM003',
                'nama' => 'Bob Smith',
                'alamat' => '789 Oak Ave',
                'jk' => 'L',
            ],
            [
                'rm' => 'RM004',
                'nama' => 'Alice Johnson',
                'alamat' => '321 Maple St',
                'jk' => 'P',
            ],
            [
                'rm' => 'RM005',
                'nama' => 'Tom Brown',
                'alamat' => '654 Pine Rd',
                'jk' => 'L',
            ],
            [
                'rm' => 'RM006',
                'nama' => 'Sally Green',
                'alamat' => '987 Cedar Ln',
                'jk' => 'P',
            ],
            [
                'rm' => 'RM007',
                'nama' => 'Jack White',
                'alamat' => '246 Birch Blvd',
                'jk' => 'L',
            ],
            [
                'rm' => 'RM008',
                'nama' => 'Emily Davis',
                'alamat' => '135 Spruce St',
                'jk' => 'P',
            ],
            [
                'rm' => 'RM009',
                'nama' => 'Mike Lee',
                'alamat' => '864 Oak St',
                'jk' => 'L',
            ],
            [
                'rm' => 'RM010',
                'nama' => 'Susan Wong',
                'alamat' => '579 Pine Ave',
                'jk' => 'P',
            ],
        ]);
    }
}
