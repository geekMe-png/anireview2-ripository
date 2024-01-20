<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    use HasFactory;

    protected $fillable = [
        'origin',
    ];

    public function review() {
        return $this->hasMany(Review::class);
    }
}
