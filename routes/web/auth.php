<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\GoogleAuthController;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
|
|
|
|
*/
/*
Route::prefix('auth')->group(function (){
    Route::resource('/login',LoginController::class);
    Route::resource('/register',RegisterController::class);
});
*/
Route::prefix('auth')->controller(LoginController::class)->group(function (){
    Route::get('/login','index');
    Route::post('/login','login')->name('login');
});

Route::prefix('auth')->controller(RegisterController::class)->group(function (){
    Route::get('/register','index');
    Route::post('/register','Register')->name('Register');
});

Route::prefix('auth')->controller(GoogleAuthController::class)->group(function (){
    Route::get('/google','redirect')->name('auth.google');
    Route::get('/google/callback','callback');
});


