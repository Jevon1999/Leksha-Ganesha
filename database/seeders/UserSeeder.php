<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            User::create([
            'name' => 'jevon',
            'email' => 'jevon@gmail.com',
            'password' => '12345678', // otomatis ke-hash karena cast: hashed
            ]);
    }
}
