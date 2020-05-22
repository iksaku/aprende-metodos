<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::view('register', 'auth.register')->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/', 'IndexController')->name('index');

    Route::post('logout', 'Auth\LogoutController')->name('logout');

    Route::prefix('method')->group(function () {
        Route::get('{method}', 'MethodController@showMethod')->name('method');

        Route::get('{method}/exercise', 'MethodController@showExercise')->name('method.exercise');
        Route::post('{method}/exercise', 'MethodController@checkExercise');
    });
});
