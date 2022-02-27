<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| FUNCTION ROUTE
| Control  : ArtikelCategoryController
| Function : Route Kategori Artikel System
*/


Route::group(['prefix' => 'artikel_cat', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Administrator' ], function() {
    Route::get('/', ['as' => 'Artikel Kat', 'uses' => 'ArtikelCategoryController@index']);

    Route::post('/create', ['as' => 'artikel_cat.create', 'uses' => 'ArtikelCategoryController@create']);
    Route::post('/getlist',['as' => 'artikel_cat.getlist', 'uses' => 'ArtikelCategoryController@getlist']);
    Route::post('/store',  ['as' => 'artikel_cat.store', 'uses' => 'ArtikelCategoryController@store']);
    Route::post('/delete', ['as' => 'artikel_cat.delete', 'uses' => 'ArtikelCategoryController@delete']);
});
