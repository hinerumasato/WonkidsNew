<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMemberController;
use App\Http\Controllers\AdminMessageController;
use App\Http\Controllers\AdminQAController;
use App\Http\Controllers\AdminUIController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Artisan;
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


// Route::get("/test", [TestController::class, 'render'])->name('test');
Route::get("/chang-language/{locale}", [LocaleController::class, 'changeLocale'])->name("change-language");
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    if($exitCode === 0) {
        return redirect()->back()->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    }

    return 'Cannot Clear Cache';

});

Route::prefix('/mail')->name('mail.')->group(function() {
    Route::get('/success/{token}', [MailController::class, 'success'])->name('success');
    Route::get('/decline/{token}', [MailController::class, 'decline'])->name('decline');
});

Route::prefix("/")->name("home.")->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::post('/', [HomeController::class, 'postQA'])->name('postQA');
    Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
    Route::get('/management', [HomeController::class, 'management'])->name('management');
    Route::get('/wonderful-story-book', [HomeController::class, 'book'])->name('book');
    Route::get('/wonderful-story-camp', [HomeController::class, 'camp'])->name('camp');
    Route::get('/wonkidsclub', [HomeController::class, 'wonkidsclub'])->name('wonkidsclub');

    Route::prefix('/media-contents')->name('media.')->group(function() {
        Route::get('/', [MediaController::class, 'index'])->name('index');
        Route::get('/{mediaSlug}', [MediaController::class, 'indexSlug'])->name('index-slug');
        Route::get('/{mediaSlug}/{detailSlug}', [MediaController::class, 'detail'])->name('detail');

    });
});

Route::prefix("/posts")->name("posts.")->group(function() {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get("/{slug}", [PostController::class, 'postDetail'])->name('post-detail');
});

Route::prefix("/admin")->middleware(['auth', 'verified', 'reload'])->name("admin.")->group(function() {
    Route::get("/", [AdminController::class, 'index'])->name('index');
    Route::get("/profile", [AdminController::class, 'profile'])->name('profile');
    Route::prefix("/setting")->name('setting.')->group(function() {
        Route::get('/account', [AdminController::class, 'account'])->name('account');
        Route::post('/account', [AdminController::class, 'accountPost'])->name('accountPost');
        Route::get('/password', [AdminController::class, 'password'])->name('password');
        Route::post('/password', [AdminController::class, 'passwordPost'])->name('passwordPost');
    });

    Route::prefix('/qa')->name('qa.')->group(function() {
        Route::get("/", [AdminQAController::class, 'index'])->name('index');
        Route::get('/answer/{id}', [AdminQAController::class, 'answer'])->name('answer');
        Route::post('/answer/{id}', [AdminQAController::class, 'postAnswer'])->name('postAnswer');
    });

    Route::prefix('/member')->name('member.')->group(function() {
        Route::get('/', [AdminMemberController::class, 'index'])->name('index');
        Route::post('/add', [AdminMemberController::class, 'postAddMember'])->name('add');
        Route::post('/send-message', [AdminMemberController::class, 'postSendMessage'])->name('send');
    });

    Route::prefix("/posts")->name("posts.")->group(function() {
        Route::get("/add", [AdminPostController::class, 'index'])->name("add");
        Route::post("/postAdd", [AdminPostController::class, 'postAdd'])->name("postAdd");
        Route::get("/edit/{post_id}/{language_id}", [AdminPostController::class, 'editIndex'])->name("edit");
        Route::put("/edit/{post_id}/{language_id}", [AdminPostController::class, 'putEdit'])->name("putEdit");
        Route::delete("/delete/{post_id}", [AdminPostController::class, 'deleteOne'])->name('deleteOne');
        Route::delete("/delete", [AdminPostController::class, 'deleteMany'])->name('deleteMany');
    });

    Route::prefix('/messages')->name('messages.')->group(function() {
        Route::get('/detail/{id}', [AdminMessageController::class, 'detail'])->name('detail');
        Route::post('/send', [AdminMessageController::class, 'postSend'])->name('send');
    });

    Route::prefix('/ui')->name('ui.')->group(function() {
        Route::get('/slider', [AdminUIController::class, 'slider'])->name('slider');
    });
});
Auth::routes();
