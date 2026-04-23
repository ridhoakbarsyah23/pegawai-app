<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agama = \App\Models\Agama::all();
        $unit = \App\Models\UnitKerja::all();
        $jabatan = \App\Models\Jabatan::all();
        $golongan = \App\Models\Golongan::all();
        $eselon = \App\Models\Eselon::all();

        for ($i = 1; $i <= 30; $i++) {

            \App\Models\Pegawai::create([
                'nip' => '1980' . str_pad($i, 12, '0', STR_PAD_LEFT),

                'nama' => 'Pegawai ' . $i,

                'tempat_lahir' => ['Jakarta', 'Bandung', 'Surabaya', 'Medan', 'Semarang'][array_rand([1, 2, 3, 4, 5])],

                'tgl_lahir' => now()->subYears(rand(25, 40))->format('Y-m-d'),

                'jenis_kelamin' => rand(0, 1) ? 'L' : 'P',

                'alamat' => 'Jl. Contoh No. ' . $i,

                'agama_id' => $agama->random()->id,
                'unit_kerja_id' => $unit->random()->id,
                'jabatan_id' => $jabatan->random()->id,
                'golongan_id' => $golongan->random()->id,
                'eselon_id' => $eselon->random()->id,

                'tempat_tugas' => ['Jakarta', 'Bandung', 'Surabaya'][array_rand([1, 2, 3])],

                'no_hp' => '08' . rand(1111111111, 9999999999),

                'npwp' => rand(10, 99) . '.' . rand(100, 999) . '.' . rand(100, 999) . '.' . rand(1, 9),

                'foto' => null,
            ]);
        }
    }
}
