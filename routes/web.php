<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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


Route::prefix("/")->name("home.")->middleware(Locale::class)->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
    Route::get('/operation', [HomeController::class, 'operation'])->name('operation');
    Route::get('/11zones', [HomeController::class, 'zone'])->name('11-zones');
});

Route::get('/change-language/{locale}', function($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name("change-language");