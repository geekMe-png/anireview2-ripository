<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'nomoto',
            'email' => 'nomoto@gmail.com',
            'password' => 'password',
            'role_id' => 1,
            'gender_id' => 3,
        ]);
    }
}
