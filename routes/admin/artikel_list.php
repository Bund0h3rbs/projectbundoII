<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| FUNCTION ROUTE
| Control  : ArtikelController
| Function : Route Kategori Artikel System
*/


Route::group(['prefix' => 'artikel_list', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Administrator' ], function() {
    Route::get('/', ['as' => 'Artikel Kat', 'uses' => 'ArtikelController@index']);

    Route::post('/create', ['as' => 'artikel.create', 'uses' => 'ArtikelController@create']);
    Route::post('/getlist',['as' => 'artikel.getlist', 'uses' => 'ArtikelController@getlist']);
    Route::post('/store',  ['as' => 'artikel.store', 'uses' => 'ArtikelController@store']);
    Route::post('/delete', ['as' => 'artikel.delete', 'uses' => 'ArtikelController@delete']);
});
