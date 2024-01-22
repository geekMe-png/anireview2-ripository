<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Year;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_title',
        'about',
        'auther',
        'directer',
        'screenwriter',
        'caracterdesign',
        'music',
        'cast',
        'company',
        'year_id',
        'movie_img',
        'movie_img_path',
    ];

    public function year() {
        return $this->belongsTo(Year::class);
    }

    public function review() {
        return $this->hasMany(Review::class);
    }
}
