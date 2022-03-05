<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| grouping website akses
|
*/

Route::get('/', 'App\Http\Controllers\Website\AwalController@index')->name('Bundo');


Route::group(['prefix' => 'artikel', 'middleware' => ['web'], 'namespace'=>'App\Http\Controllers\Website' ], function() {
    Route::get('/', ['as' => 'artikel', 'uses' => 'ArtikelController@index']);
});

Route::group(['prefix' => 'produk', 'middleware' => ['web'], 'namespace'=>'App\Http\Controllers\Website' ], function() {
    Route::get('/', ['as' => 'produk', 'uses' => 'ProdukController@index']);
});

Route::group(['prefix' => 'join_us', 'middleware' => ['web'], 'namespace'=>'App\Http\Controllers\Website' ], function() {
    Route::get('/', ['as' => 'join_us', 'uses' => 'JoinusController@index']);
});

Route::group(['prefix' => 'about', 'middleware' => ['web'], 'namespace'=>'App\Http\Controllers\Website' ], function() {
    Route::get('/', ['as' => 'about', 'uses' => 'AboutController@index']);
});

Route::group(['prefix' => 'contact_me', 'middleware' => ['web'], 'namespace'=>'App\Http\Controllers\Website' ], function() {
    Route::get('/', ['as' => 'contact_me', 'uses' => 'ContactController@index']);
    Route::post('/pesan', ['as' => 'contact_me.pesan', 'uses' => 'ContactController@pesan']);
});

