<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Year;

class YearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Year::create(['year' => '1950年代']);
        Year::create(['year' => '1960年代']);
        Year::create(['year' => '1970年代']);
        Year::create(['year' => '1980年代']);
        Year::create(['year' => '1990年代']);
        Year::create(['year' => '2000年代']);
        Year::create(['year' => '2010年代']);
        Year::create(['year' => '2020年代']);
    }
}
