<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use App\Models\User;
use App\Models\Review;

class HomeController extends Controller
{
    public function index() {
        $reviews = Review::with('original', 'movie', 'user')->get();

        if(auth()->id()) {
            $user_name = Auth::user()->name;
        }else{
            $user_name = '';
        }

        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'reviews' => $reviews,
            'user_name' => $user_name,
        ]);
    }
}
