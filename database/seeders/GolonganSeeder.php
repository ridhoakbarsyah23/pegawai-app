<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('golongans')->insert([
            ['golongan' => 'I/a'],
            ['golongan' => 'I/b'],
            ['golongan' => 'II/a'],
            ['golongan' => 'II/b'],
            ['golongan' => 'III/a'],
            ['golongan' => 'III/b'],
            ['golongan' => 'IV/a'],
        ]);
    }
}
