<?php

namespace Database\Seeders;

use App\Models\Cooperatives;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CooperativesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = faker::create('id_ID'); // Menggunakan lokal Indonesia untuk data yang lebih relevan

        for ($i = 0; $i < 10; $i++) { // Membuat 10 data dummy
            Cooperatives::create([
                'name_cooperatives' => 'Koperasi ' . $faker->company, // Nama koperasi dummy
                'address' => $faker->address, // Alamat dummy
                'no_telp' => $faker->phoneNumber, // Nomor telepon dummy
            ]);
        }
    }
}
