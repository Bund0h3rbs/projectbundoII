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

Route::group(['prefix' => 'daftar_brg', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Administrator' ], function() {
    Route::get('/', ['as' => 'Daftar Barang', 'uses' => 'DaftarBarangController@index']);
    Route::post('/create', ['as' => 'daftar_brg.create', 'uses' => 'DaftarBarangController@create']);
    Route::post('/getlist', ['as' => 'daftar_brg.getlist', 'uses' => 'DaftarBarangController@getlist']);
    Route::post('/store', ['as' => 'daftar_brg.store', 'uses' => 'DaftarBarangController@store']);
});
