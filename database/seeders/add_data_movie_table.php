<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class add_data_movie_table extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Movie::create([
            'movie_title' => 'b',
            'about' => 'b',
            'auther' => 'b',
            'directer' => 'b',
            'screenwriter' => 'b',
            'caracterdesign' => 'b',
            'music' => 'b',
            'company' => 'b',
            'year_id' => '1',
            'movie_img' => 'b',
            'movie_img_path' => 'b',
        ]);
    }
}
