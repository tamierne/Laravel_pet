<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\UserlistController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'logged'], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('logout', [AdminController::class, 'logout'])->name('logout');
    Route::resource('album', AlbumController::class);
    // Route::group(['prefix' => 'album/{album}'], function() {
    //     Route::resource('photo', PhotoController::class);
    // });
    // Route::resource('photo', PhotoController::class);
    Route::post('album/{album}/upload', [PhotoController::class, 'store'])->name('photo.upload');
    Route::resource('user', UserlistController::class);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AdminController::class, 'registerForm']);
    Route::post('/register', [AdminController::class, 'register'])->name('register');
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'login'])->name('login');
});