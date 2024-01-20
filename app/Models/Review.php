<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Origin;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'score',
        'review_title',
        'review_content',
        'movie_id',
        'original_id',
        'user_id',
    ];

    public function original() {
        return $this->belongsTo(Origin::class);
    }

    public function movie() {
        return $this->belongsTo(Movie::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
