<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Review;
use App\Models\Origin;
use App\Models\Movie;
use App\Models\User;

class ReviewController extends Controller
{
    public function index(Review $review) {
        //dd($review->id);
        $user_reviews = Review::where('id', $review->id)->with('movie', 'user', 'original')->get();
        $reviews = Review::where('movie_id', $review->movie_id)->with('original', 'user')->get();
        //dd($user_reviews);

        foreach($user_reviews as $user_review) {
            $create_time = (new Carbon($user_review->updated_at))->format('Y/m/d H:i');
            //dd($create_time);
        };

        if($reviews->count() > 0) {
            $review_score = $reviews->sum('score');
            $review_count = $reviews->count();
            $review_average = round($review_score / $review_count, 1);

        }else{
            $review_score = '';
            $review_count = '';
            $review_average = '';
        }

        if(Auth()->id()) {
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;
        }else{
            $user_id = '';
            $user_name = '';
        }

        return Inertia::render('Review', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'reviews' => $user_reviews,
            'review_id' => $review,
            'review_count' => $review_count,
            'review_average' => $review_average,
            'create_time' => $create_time,
            'user_id' => $user_id,
            'user_name' => $user_name,
            'home_route' => route('welcome'),
            'user_route' => route('mypage', $user_id),
        ]);
    }

    public function create($movie_id) {
        $movies = Movie::where('id', $movie_id)->get();

        $reviews = [0 => [
            'score' => 3,
            'review_title' => null,
            'review_content' => null,
            'original_id' => null,
        ]]; 

        //if(User::where('id')) {
          //  $users_id = Auth::user()->id;
           // $users_name = Auth::user()->name;
        //}else{
          //  $users = User::wherenull('id');
        //}

        if(auth()->id()) {
            $user_name = Auth::user()->name;
            $user_id = Auth::user()->id;
        }else{
            $user_name = '';
            $user_id = '';
        }

        return Inertia::render('backend/review_edit', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'origins' => Origin::all(),
            'movies' => $movies,
            'reviews' => $reviews,
            'user_id' => $user_id,
            'user_name' => $user_name,
            'movie_id' => $movie_id,
            'home_route' => route('welcome'),
            'user_route' => route('mypage', $user_id),
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

    public function edit($movie_id, Review $review) {
        $movies = Movie::where('id', $movie_id)->get();
        $reviews = Review::where('id', $review->id)->with('user', 'movie', 'original')->get();

        if(auth()->id()) {
            $user_name = Auth::user()->name;
            $user_id = Auth::user()->id;
        }else{
            $user_name = '';
            $user_id = '';
        }

        return Inertia::render('backend/review_edit', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'origins' => Origin::all(),
            'movies' => $movies,
            'reviews' => $reviews,
            'review_id' => $review->id,
            'user_id' => $user_id,
            'user_name' => $user_name,
            'movie_id' => $movie_id,
            'home_route' => route('welcome'),
            'user_route' => route('mypage', $user_id),
        ]);
    }

    public function update($movie_id, Review $review, Request $request) {
        $post = $review->update([
            'original_id' => $request->original_id,
            'score' => $request->score,
            'review_title' => $request->review_title,
            'review_content' => $request->review_content,
            'movie_id' => $request->movie_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('review', $review->id);
    }

    public function destroy(Review $review) {
        $review->delete();
        
        return redirect()->route('welcome');
    }
}
