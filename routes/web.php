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

Route::get('/', function () {
    return view('welcome');
});

Route::group(["middleware" => ["auth", "permission-check"]], function () {
    Route::resource('homestays', 'HomestayController');
    Route::resource('roles', 'RoleController');
});

Route::post('homestays/methodtambahan', 'HomestayController@methodtambahan')->name('homestays.methodtambahan');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
