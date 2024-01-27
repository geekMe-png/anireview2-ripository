<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Gender extends Model
{
    use HasFactory;

    protected $fillable = [
        'gender',
    ];

    public function user() {
        return $this->hasMany(User::class);
    }
}