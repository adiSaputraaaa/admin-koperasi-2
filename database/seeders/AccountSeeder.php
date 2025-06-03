<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Account::create([
            'name' => 'Owner Koperasi',
            'email' => 'owner@contoh.com',
            'password' => Hash::make('password'), // password yang sudah di-hash
            'role' => 'owner',
            'remember_token' => null,
        ]);

        Account::create([
            'name' => 'Admin Koperasi',
            'email' => 'admin@contoh.com',
            'password' => Hash::make('password'),
            'role' => 'admin', // sesuai enum dan penulisan dengan underscore
            'remember_token' => null,
        ]);
    }
}
