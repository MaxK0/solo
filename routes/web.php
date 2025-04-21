<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;



Route::get('/', SiteController::class.'@home')->name('home');
Route::get('/services', ServiceController::class.'@index')->name('services');

Route::middleware('guest')->group(function(){
    Route::get('/login', AuthController::class.'@login')->name('login');
    Route::post('/login', AuthController::class.'@loginStore')->name('login.store');

    Route::get('/register', AuthController::class.'@register')->name('register');
    Route::post('/register', AuthController::class.'@registerStore')->name('register.store');
});

Route::middleware('auth')->group(function(){
    Route::get('/logout', AuthController::class.'@logout')->name('logout');
    Route::get('/profile', SiteController::class.'@profile')->name('profile');
    Route::prefix('/services/{service}')->name('services.')->group(function(){
       Route::get('/book', ServiceController::class.'@booking')->name('booking');
       Route::post('/book', ServiceController::class.'@book')->name('book');
       Route::get('/choose', ServiceController::class.'@choose')->name('choose');
       Route::post('/choose', ServiceController::class.'@chose')->name('chose');
    });
});
