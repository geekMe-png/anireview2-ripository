<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;

class MypageController extends Controller
{
    public function index($user_id) {
        //dd($user_id);
        //URLパラメータで指定したIDのユーザーのレビュー数と一覧を取得
        $reviews = Review::where('user_id', $user_id)->with('original', 'user', 'movie')->get();
        //dd($reviews);
        $reviews_count = Review::where('user_id', $user_id)->count();
        //URLパラメータで指定したIDのユーザー情報を取得
        $users = User::with('gender')->where('id', $user_id)->get();

        if(Auth()->id()) {
            $user_id = Auth::user()->id;
            $user_name = Auth::user()->name;
            $auth = Auth::user()->role_id;
        }else{
            $user_id = '';
            $user_name = '';
            $auth = '';
        }

        return Inertia::render('Mypage', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'users' => $users,
            'reviews' => $reviews,
            'reviews_count' => $reviews_count,
            'user_id' => $user_id,
            'user_name' => $user_name,
            'auth' => $auth,
            'home_route' => route('welcome'),
            'user_route' => route('mypage', $user_id),
        ]);
    }
}
