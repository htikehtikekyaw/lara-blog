<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/photo-test', function () {
    return \Illuminate\Support\Facades\Storage::allFiles('public');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('page.index');
Route::get('/detail/{slug}', [App\Http\Controllers\PageController::class, 'detail'])->name('page.detail');
Route::get("/category/{category:slug}", [App\Http\Controllers\PageController::class, 'postByCategory'])->name('page.category');
Route::get("/postByUser/{user:name}", [App\Http\Controllers\PageController::class, 'postByUser'])->name('page.user');
Route::get("/postByDay/{day}", [App\Http\Controllers\PageController::class, 'postByDay'])->name('page.day');

Route::middleware('auth')->prefix('dashboard')->group(function(){
    Route::resource('/category',App\Http\Controllers\CategoryController::class);
    Route::resource('/post',App\Http\Controllers\PostController::class);
    Route::resource('/photo',App\Http\Controllers\PhotoController::class);
    Route::resource('/user',App\Http\Controllers\UserController::class);
    Route::resource('/nation',App\Http\Controllers\NationController::class);
});
