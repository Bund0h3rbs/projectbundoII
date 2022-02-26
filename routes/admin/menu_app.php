<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| FUNCTION ROUTE
| Control  : MenusControll
| Function : Route Menu System
*/

Route::group(['prefix' => 'menu_app', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Administrator' ], function() {
    Route::get('/', ['as' => 'Menus', 'uses' => 'MenusController@index']);
    Route::post('/create', ['as' => 'menu.create', 'uses' => 'MenusController@create']);
    Route::post('/edit',   ['as' => 'menu.edit', 'uses' => 'MenusController@edit']);
    Route::post('/getlist',['as' => 'menu.getlist', 'uses' => 'MenusController@getlist']);
    Route::post('/store',  ['as' => 'menu.store', 'uses' => 'MenusController@store']);
    Route::post('/delete',['as' => 'menu.delete', 'uses' => 'MenusController@delete']);

    Route::post('/addAkses',['as' => 'menu.addAkses', 'uses' => 'MenusController@addAkses']);
});
