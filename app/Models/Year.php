<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Year extends Model
{
    use HasFactory;

    public function movie() {
        return $this->hasMany(Movie::class);
    }
}
