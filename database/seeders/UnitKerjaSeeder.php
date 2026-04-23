<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('unit_kerjas')->insert([
            ['nama_unit' => 'Sekretariat'],
            ['nama_unit' => 'Kepegawaian'],
            ['nama_unit' => 'Keuangan'],
            ['nama_unit' => 'IT'],
            ['nama_unit' => 'Umum'],
        ]);
    }
}
