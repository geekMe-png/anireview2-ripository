<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Origin;

class OriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Origin::create(['origin' => '原作を読んでいる']);
        Origin::create(['origin' => '原作を読んでいない']);
    }
}
