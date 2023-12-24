<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/movie', function () {
    return view('movie');
})->name('movie');

Route::get('/mypage', function () {
    return view('mypage');
})->name('mypage');

Route::get('/review', function () {
    return view('review');
})->name('review');

Route::get('/movie/edit', [MovieController::class, 'create'])->name('movie_edit');

Route::post('/movie/edit',[MovieController::class, 'store'])->name('movie_edit.store');

Route::get('/movie/remove', function () {
    return view('backend/movie_remove');
})->name('movie_remove');

Route::get('/review/edit', function () {
    return view('backend/review_edit');
})->name('review_edit');

Route::get('/review/remove', function () {
    return view('backend/review_remove');
})->name('review_remove');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
