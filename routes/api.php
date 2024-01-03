<?php

use App\Http\Controllers\API\LocaleController;
use App\Http\Controllers\API\MediaController;
use App\Http\Controllers\API\MediaStagingAreaController;
use App\Http\Controllers\API\SliderController;
use App\Http\Controllers\API\SliderDescriptionController;
use App\Http\Controllers\API\UploadImgController;
use App\Http\Controllers\API\StagingAreaController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user/update', [UserController::class, 'update'])->name('update-user-api');

Route::post('/upload-staging-area', [StagingAreaController::class, 'upload'])->name('upload-staging-area');
Route::delete('/delete-staging-area', [StagingAreaController::class, 'deleteOne'])->name('delete-staging-area');

Route::post('/upload-img-area', [UploadImgController::class, 'upload'])->name('upload-img-area');
Route::delete('/delete-img-area', [UploadImgController::class, 'deleteOne'])->name('delete-img-area');

Route::post('/media/area/upload', [MediaStagingAreaController::class, 'upload'])->name('upload-media-area');
Route::post('/media/upload', [MediaController::class, 'upload'])->name('upload-media');

// Route::post('/locale/change', [LocaleController::class, 'changeLocale'])->name('change-locale');

Route::post('/ui/slider', [SliderController::class, 'upload'])->name('upload-slider');
Route::delete('/ui/slider', [SliderController::class, 'deleteOne'])->name('delete-slider');

Route::post('ui/slider-description', [SliderDescriptionController::class, 'update'])->name('update-slider-description');

Route::get('/v1/user', [UserController::class, 'getLoginUser'])->name('get-login-user');
Route::post('/v1/login', [UserController::class, 'login']);
Route::post('/v1/register', [UserController::class, 'register']);