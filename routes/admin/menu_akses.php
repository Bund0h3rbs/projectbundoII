<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| FUNCTION ROUTE
| Control  : MenusAksesController
| Function : Route Akses Menu System
*/


Route::group(['prefix' => 'menu_akses', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Administrator' ], function() {
    Route::get('/', ['as' => 'AKses', 'uses' => 'MenusAksesController@index']);

    Route::post('/create', ['as' => 'akses.create', 'uses' => 'MenusAksesController@create']);
    Route::post('/getlist',['as' => 'akses.getlist', 'uses' => 'MenusAksesController@getlist']);
    Route::post('/store',  ['as' => 'akses.store', 'uses' => 'MenusAksesController@store']);
    Route::post('/delete', ['as' => 'akses.delete', 'uses' => 'MenusAksesController@delete']);

    Route::post('/allakses',     ['as' => 'akses.allakses', 'uses' => 'MenusAksesController@allakses']);
    Route::post('/privateakses', ['as' => 'akses.privateakses', 'uses' => 'MenusAksesController@privateakses']);
    Route::post('/detailItems',  ['as' => 'akses.detailItems', 'uses' => 'MenusAksesController@detailItems']);

    Route::post('/storePrivateRole', ['as' => 'akses.storePrivateRole', 'uses' => 'MenusAksesController@storePrivateRole']);
    Route::post('/storeAllAkses',    ['as' => 'akses.storeAllAkses', 'uses' => 'MenusAksesController@storeAllAkses']);


});
