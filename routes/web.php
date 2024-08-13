<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;

route::get('/register',[AuthController::class, 'register'])->name('register');
route::post('/register',[AuthController::class, 'store'])->name('register');
route::get('/login',[AuthController::class, 'showlogin'])->name('showlogin');
route::post('/login',[AuthController::class, 'login'])->name('login');
route::get('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/', [UserController::class, 'index'])->name('message');

Route::middleware(['auth'])->group(function () {
   Route::get('/profile', [UserController::class, 'profile'])->name('profile');
   Route::get('/daftar', [DaftarController::class, 'index'])->name('daftar');
   Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
});