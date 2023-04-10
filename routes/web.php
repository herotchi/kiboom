<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [TopController::class, 'top'])->name('top');
Route::get('/users/add', [UserController::class, 'add'])->name('users.add');
Route::post('/users/insert', [UserController::class, 'insert'])->name('users.insert');