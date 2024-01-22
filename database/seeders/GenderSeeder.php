<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gender::create(['gender' => '男性',]);
        Gender::create(['gender' => '女性']);
        Gender::create(['gender' => '回答なし']);
    }
}
