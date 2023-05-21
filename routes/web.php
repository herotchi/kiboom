<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

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

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show_login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/users/add', [UserController::class, 'add'])->name('users.add');
    Route::post('/users/insert', [UserController::class, 'insert'])->name('users.insert');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [TopController::class, 'top'])->name('top');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/users/update', [UserController::class, 'update'])->name('users.update');
    Route::post('/users/login_update', [UserController::class, 'login_update'])->name('users.login_update');

    Route::get('/posts/add', [PostController::class, 'add'])->name('posts.add');
    Route::post('/posts/insert', [PostController::class, 'insert'])->name('posts.insert');
    Route::get('/posts/{id}', [PostController::class, 'detail'])->name('posts.detail');

});


