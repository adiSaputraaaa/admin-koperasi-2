<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
                // Pastikan ini ada dan dijalankan duluan
            AccountSeeder::class, // Jika Anda punya AccountSeeder
            CooperativesSeeder::class,
            ProfilSeeder::class, // Tambahkan baris ini
        ]);
    }
}
