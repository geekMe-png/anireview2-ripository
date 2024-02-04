<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\SearchController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/review/{review}', [ReviewController::class, 'index'])->name('review');

Route::delete('/review/{review}', [ReviewController::class, 'destroy'])->name('review.destroy');

Route::get('/review-edit/{movie_id}', [ReviewController::class, 'create'])->name('review.create');

Route::post('/review-edit/{movie_id}', [ReviewController::class, 'store'])->name('review.store');

Route::get('/movie/{movie}', [MovieController::class, 'index'])->name('movie');

Route::delete('/movie/{movie}', [MovieController::class, 'destroy'])->name('movie.destroy');

Route::get('/movie-edit/{movie_id}', [MovieController::class, 'create'])->name('movie.create');

Route::post('/movie-edit/{movie_id}', [MovieController::class, 'store'])->name('movie.store');

Route::get('/mypage/{user_id}', [MypageController::class, 'index'])->name('mypage');

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
