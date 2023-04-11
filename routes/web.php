<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\UserController;

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
});


