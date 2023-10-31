<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IndexController;
use \App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/Index', [IndexController::class, 'Index'])->name('index');
});
Route::get('/', [UserController::class, 'login_page'])->name('login');
Route::get('/register', [UserController::class, 'register_page'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login_function');
Route::post('/register', [UserController::class, 'register'])->name('register_function');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');




