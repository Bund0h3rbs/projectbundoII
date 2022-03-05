<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| FUNCTION ROUTE
| Control  : LoginController
| Function : Login And Register
*/


Route::get('login', 'App\Http\Controllers\Auth\LoginController@create')->name('login');
Route::post('login_masuk', 'App\Http\Controllers\Auth\LoginController@login')->name('login_masuk');

Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');


