<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\Locale;

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

Route::get("/chang-language/{locale}", function($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name("change-language");

Route::prefix("/")->name("home.")->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
    Route::get('/operation', [HomeController::class, 'operation'])->name('operation');
});

Route::prefix("/posts")->name("posts.")->group(function() {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get("/{id}", [PostController::class, 'postDetail'])->name('post-detail');
});

Route::get('/change-language/{locale}', function($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name("change-language");