<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', [\App\Http\Controllers\AuthController::class, 'create'])->name('register.create');
Route::post('register', [\App\Http\Controllers\AuthController::class, 'store'])->name('register.store');
Route::get('login', [\App\Http\Controllers\AuthController::class, 'loginForm'])->name('loginForm');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');


Route::prefix('/user')->group(function () {
    Route::resource('events', \App\Http\Controllers\EventController::class)->middleware('user');
});
Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
