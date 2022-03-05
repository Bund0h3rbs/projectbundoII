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

Route::group(['prefix' => 'produk_ref', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Administrator' ], function() {
    Route::get('/', ['as' => 'Tipe Barang', 'uses' => 'TypeBarangController@index']);
    Route::post('/create', ['as' => 'produk_ref.create', 'uses' => 'TypeBarangController@create']);
    Route::post('/getlist', ['as' => 'produk_ref.getlist', 'uses' => 'TypeBarangController@getlist']);
    Route::post('/store', ['as' => 'produk_ref.store', 'uses' => 'TypeBarangController@store']);
    Route::post('/delete', ['as' => 'produk_ref.delete', 'uses' => 'TypeBarangController@delete']);
});
