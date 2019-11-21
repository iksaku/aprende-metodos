<?php

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

Auth::routes([
    'register' => true,
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::middleware('auth')->group(function () {
    Route::get('/', 'IndexController@index')->name('index');

    Route::prefix('method')->group(function () {
        Route::get('{method}', 'MethodController@showMethod')->name('method');

        Route::get('{method}/exercise', 'MethodController@showExercise')->name('method.exercise');
        Route::post('{method}/exercise', 'MethodController@checkExercise');
    });
});
