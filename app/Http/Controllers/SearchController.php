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

class SearchController extends Controller
{
    public function index(Request $request) {
        //dd($request->search);
        $word = $request->search;

        $search_results = Movie::where('movie_title', 'like',  '%' . $word . '%')->with('review', 'year')->get();

        //$review_score = $search_results->review_id->score;

        //$scores = Review::selectRaw('SUM(score) as total_score')->get();
        //作品の平均点
        //foreach($search_results as $search_result) {
            //$movie_ids = $search_result->id;
            //$score_total = Review::where('movie_id', $movie_id)->sum('score');
            //$count = Review::where('movie_id', $movie_id)->count();
            //$score_average = round($score_total / $count, 1);
        //};

        //dd($search_result);

        return Inertia::render('Search', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'word' => $word,
            'search_results' => $search_results,
        ]);
    }
}
