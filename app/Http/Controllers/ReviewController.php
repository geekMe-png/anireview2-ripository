<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Origin;
use App\Models\Movie;
use App\Models\User;

class ReviewController extends Controller
{
    public function create($movie_id) {
        $movies = Movie::where('id', $movie_id)->get();
        if(User::where('id')) {
            $users_id = Auth::user()->id;
            $users_name = Auth::user()->name;
        }else{
            $users = User::wherenull('id');
        }

        return Inertia::render('backend/review_edit', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'origins' => Origin::all(),
            'movies' => $movies,
            'user_id' => $users_id,
            'user_name' => $users_name,
            'movie_id' => $movie_id,
        ]);
    }

    public function store(Request $request) {
        $post = Review::create([
            'original_id' => $request->original_id,
            'score' => $request->score,
            'review_title' => $request->review_title,
            'review_content' => $request->review_content,
            'movie_id' => $request->movie_id,
            'user_id' => auth()->id(),
        ]);

        return back();
    }
}