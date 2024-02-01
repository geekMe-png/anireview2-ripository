<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use App\Models\Year;
use App\Models\Review;

class MovieController extends Controller
{
    public function index(Movie $movie) {
        $movies = Movie::with('year')->where('id', $movie->id)->get();

        $reviews = Review::with('original', 'user')->where('movie_id', $movie->id)->get();

        if($reviews->count() > 0) {
            $review_score = $reviews->sum('score');
            $review_count = $reviews->count();
            $review_average = round($review_score / $review_count, 1);

        }else{
            $review_score = '';
            $review_count = '';
            $review_average = '';
        }

        //dd($review_average);

        if(auth()->id()) {
            $auth = Auth::user()->role_id;
        }else{
            $auth = '';
        }

        return Inertia::render('Movie', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'movies' => $movies,
            'reviews' => $reviews,
            'auth' => $auth,
            'movie_id' => $movie,
            'review_count' => $review_count,
            'review_average' => $review_average,
        ]);
    }

    public function create() {
        return Inertia::render('backend/movie_edit', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'years' => Year::all(),
        ]);
    }

    public function store(Request $request) {

        //画像ファイルを保存するディレクトリ名
        $dir = 'img';
        //モデルを変数に入れることでデータベースを操作するインスタンスを作成
        $movie = new Movie();

        // アップロードされたファイル名を取得
        $filename = $request->file('movie_img')->getClientOriginalName();

        //画像ファイルを保存するディレクトリはstorage/app/public/img/
        $request->file('movie_img')->storeAs('image', $filename, 'public');


        //データベースに追加
        //$image->実際に存在するテーブルの列名 = $file_name;
        //$image->実際に存在するテーブルの列名 = 'storage/app/public/' . $dir . '/' . $file_name;
        $post = Movie::create([
            'movie_title' => $request->movie_title,
            'about' => $request->movie_about,
            'auther' => $request->auther,
            'directer' => $request->directer,
            'screenwriter' => $request->screenwriter,
            'caracterdesign' => $request->characterdesign,
            'music' => $request->music,
            'cast' => $request->movie_cast,
            'company' => $request->company,
            'year_id' => $request->year_id,
            'movie_img' => $filename,
            'movie_img_path' => 'storage/image' . '/' . $filename,
        ]);

        return back();
    }

    public function destroy(Movie $movie) {
        $movie->delete();
        
        return redirect()->route('welcome');
    }
}
