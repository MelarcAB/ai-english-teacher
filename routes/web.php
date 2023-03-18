<?php

use Illuminate\Support\Facades\Route;


Route::controller(App\Http\Controllers\TestController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/landing', 'landing');
});



//auth controller
Route::controller(App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/login', 'show')->name('auth.login.show');
    Route::get('/register', 'create')->name('auth.register.show');
    Route::post('/login', 'singin')->name('auth.login.singin');
    Route::get('/auth/google', 'redirectToGoogle')->name('google.login');
    Route::get('/auth/google/callback', 'handleGoogleCallback')->name('google.callback');
});
