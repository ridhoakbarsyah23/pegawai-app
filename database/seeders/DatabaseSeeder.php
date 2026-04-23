<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'test@example.com'],
        [
            'name' => 'Test User',
            'password' => bcrypt('123456'),
        ]
    );
    
    $this->call(
        [
            AgamaSeeder::class,
            GolonganSeeder::class,
            EselonSeeder::class,
            UnitKerjaSeeder::class,
            JabatanSeeder::class,
            UserSeeder::class,
        ]);
    }
}