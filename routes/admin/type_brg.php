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

Route::group(['prefix' => 'type_brg', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Administrator' ], function() {
    Route::get('/', ['as' => 'Tipe Barang', 'uses' => 'TypeBarangController@index']);
    Route::post('/create', ['as' => 'type_brg.create', 'uses' => 'TypeBarangController@create']);
    Route::post('/getlist', ['as' => 'type_brg.getlist', 'uses' => 'TypeBarangController@getlist']);
    Route::post('/store', ['as' => 'type_brg.store', 'uses' => 'TypeBarangController@store']);
});
