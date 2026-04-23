<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EselonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('eselons')->insert
        ([
            ['nama_eselon' => 'Eselon I'],
            ['nama_eselon' => 'Eselon II'],
            ['nama_eselon' => 'Eselon III'],
            ['nama_eselon' => 'Eselon IV'],
        ]);
    }
}
