<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Cooperatives;
use App\Models\Profil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $accountIds = Account::pluck('id')->toArray();
        $cooperativeIds = Cooperatives::pluck('id')->toArray();

        if (empty($accountIds)) {
            $this->command->warn('Tidak ada data Account. Silakan jalankan AccountSeeder terlebih dahulu.');
            return;
        }

        if (empty($cooperativeIds)) {
            $this->command->warn('Tidak ada data Cooperatives. Silakan jalankan CooperativesSeeder terlebih dahulu.');
            return;
        }

        // Buat profil untuk setiap account yang ada, agar tidak ada yang kosong
        foreach ($accountIds as $accountId) {
            Profil::create([
                'account_id' => $accountId,
                'cooperatives_id' => $faker->randomElement($cooperativeIds),
                'full_name' => $faker->name,
                'gender' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'address' => $faker->address,
                'url_photo_profil' => $faker->imageUrl(640, 480, 'people'),
                'phone' => $faker->phoneNumber,
                'birth_date' => $faker->date('Y-m-d', '2000-01-01'),
                'birth_date_place' => $faker->city,
                'diploma' => $faker->randomElement(['SMA', 'D3', 'S1', 'S2']),
                'nik' => $faker->numerify('################'),
                'url_file_ktp' => $faker->url,
                'kk' => $faker->numerify('################'),
                'url_file_kk' => $faker->url,
                'salary' => $faker->numberBetween(3000000, 10000000),
            ]);
        }
    }
}
