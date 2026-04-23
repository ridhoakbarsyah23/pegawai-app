<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatans')->insert([

            // STRUKTURAL
            [
                'nama' => 'Kepala Sekretariat Utama',
                'jenis' => 'struktural',
                'level' => null,
                'eselon' => 'I'
            ],
            [
                'nama' => 'Kepala Biro',
                'jenis' => 'struktural',
                'level' => null,
                'eselon' => 'II'
            ],
            [
                'nama' => 'Kepala Subbag',
                'jenis' => 'struktural',
                'level' => null,
                'eselon' => 'IV'
            ],

            // FUNGSIONAL - SURVEYOR
            [
                'nama' => 'Surveyor Pemetaan',
                'jenis' => 'fungsional',
                'level' => 'pertama',
                'eselon' => null
            ],
            [
                'nama' => 'Surveyor Pemetaan',
                'jenis' => 'fungsional',
                'level' => 'muda',
                'eselon' => null
            ],
            [
                'nama' => 'Surveyor Pemetaan',
                'jenis' => 'fungsional',
                'level' => 'madya',
                'eselon' => null
            ],

            // FUNGSIONAL - ANALIS
            [
                'nama' => 'Analis',
                'jenis' => 'fungsional',
                'level' => 'pertama',
                'eselon' => null
            ],
            [
                'nama' => 'Analis',
                'jenis' => 'fungsional',
                'level' => 'muda',
                'eselon' => null
            ],

            // PENELITI
            [
                'nama' => 'Peneliti',
                'jenis' => 'fungsional',
                'level' => 'pertama',
                'eselon' => null
            ],

        ]);
    }
}
