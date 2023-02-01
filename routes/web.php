<?php

use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', [ArticleController::class, 'index'])->name('index');

Route::get('/categories/{category:name}', [CategoryController::class, 'filterByCategory'])->name('categories');

Route::resource('article', ArticleController::class)->middleware('auth');

Route::resource('category', CategoryController::class)->middleware('auth');

Route::get('/tags/{tag:name}', [TagController::class, 'filterByTag'])->name('tags');

Route::resource('tag', TagController::class)->middleware('auth');

Route::get('authors/{author:name}', function (User $author) {
    return view('index', [
        'articles' => $author->articles
    ]);
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
