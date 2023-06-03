<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\Locale;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

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
Auth::routes(['verify' => true]);

Route::get("/chang-language/{locale}", function($locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name("change-language");

Route::prefix("/")->name("home.")->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
    Route::get('/operation', [HomeController::class, 'operation'])->name('operation');
    Route::get('/wonderful-story-book', [HomeController::class, 'book'])->name('book');
    Route::get('/wonderful-story-camp', [HomeController::class, 'camp'])->name('camp');
    Route::get('/wonkidsclub', [HomeController::class, 'wonkidsclub'])->name('wonkidsclub');
});

Route::prefix("/posts")->name("posts.")->group(function() {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get("/{slug}", [PostController::class, 'postDetail'])->name('post-detail');
});

Route::prefix("/admin")->name("admin.")->group(function() {
    Route::get("/", [AdminController::class, 'index'])->name('index');
    Route::get("/profile", [AdminController::class, 'profile'])->name('profile');
    Route::get("/setting", [AdminController::class, 'setting'])->name('setting');
    Route::post("/setting", [AdminController::class, 'settingPost'])->name('settingPost');
    Route::prefix("/posts")->name("posts.")->group(function() {
        Route::get("/add", [AdminPostController::class, 'index'])->name("add");
        Route::post("/postAdd", [AdminPostController::class, 'postAdd'])->name("postAdd");
        Route::get("/edit/{post_id}/{language_id}", [AdminPostController::class, 'editIndex'])->name("edit");
        Route::put("/edit/{post_id}/{language_id}", [AdminPostController::class, 'putEdit'])->name("putEdit");
        Route::delete("/delete/{post_id}", [AdminPostController::class, 'delete'])->name('delete');
    });
});