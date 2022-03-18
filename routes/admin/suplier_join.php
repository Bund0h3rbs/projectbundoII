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

Route::group(['prefix' => 'suplier_join', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Administrator' ], function() {
    Route::get('/', ['as' => 'Pesan Supplier', 'uses' => 'SupplierController@index']);
    Route::post('/create', ['as' => 'suplier_join.create', 'uses' => 'SupplierController@create']);
    Route::post('/getlist', ['as' => 'suplier_join.getlist', 'uses' => 'SupplierController@getlist']);
    Route::post('/store', ['as' => 'suplier_join.store', 'uses' => 'SupplierController@store']);
    Route::post('/delete', ['as' => 'suplier_join.delete', 'uses' => 'SupplierController@delete']);
});
