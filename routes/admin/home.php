<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| FUNCTION ROUTE
| Control  : EmployeeController
| Function : Route Profile Employee->admin
*/

Route::group(['prefix' => 'home', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers' ], function() {
    Route::get('/', ['as' => 'Home', 'uses' => 'HomeController@index']);
    Route::post('/create', ['as' => 'menus.create', 'uses' => 'HomeController@create']);
    Route::post('/getlist', ['as' => 'menus.getlist', 'uses' => 'HomeController@getlist']);
    Route::post('/store', ['as' => 'menus.store', 'uses' => 'HomeController@store']);
});
