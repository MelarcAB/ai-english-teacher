<?php

use Illuminate\Support\Facades\Route;


Route::controller(App\Http\Controllers\TestController::class)->group(function () {
    Route::get('/', 'landing');
    Route::get('/landing', 'landing');
});



//auth controller
Route::controller(App\Http\Controllers\AuthController::class)->group(function () {
    Route::get('/login', 'show')->name('auth.login.show');
    Route::get('/register', 'create')->name('auth.register.show');
    Route::post('/register', 'store')->name('auth.register.store');
    Route::post('/login', 'singin')->name('auth.login.singin');
    Route::get('/auth/google', 'redirectToGoogle')->name('google.login');
    Route::get('/auth/google/callback', 'handleGoogleCallback')->name('google.callback');
    //logout
    Route::post('/logout', 'logout')->name('auth.logout');
});


//home controller (only for auth)
Route::controller(App\Http\Controllers\HomeController::class)->middleware('auth')->group(function () {
    Route::get('/home', 'index')->name('home');
});

//test controller (only for auth)
Route::controller(App\Http\Controllers\TestController::class)->middleware('auth')->group(function () {
    Route::get('/test', 'index')->name('test');
    Route::post('/test', 'generateResponse')->name('test.generateResponse');
    //exam list
    Route::get('/exam/list', 'list')->name('exam.list');
    //exam show
    Route::get('/exam/{exam:id}', 'show')->name('exam.show');
    //exam create
    Route::get('/new-exam', 'create')->name('exam.create');
});


//logs controller (only for auth)
Route::controller(App\Http\Controllers\LogController::class)->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/logs', 'index')->name('logs');
});
