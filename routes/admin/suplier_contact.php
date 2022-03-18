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

Route::group(['prefix' => 'suplier_contact', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Administrator' ], function() {
    Route::get('/', ['as' => 'Pesan Supplier', 'uses' => 'SupplierContactController@index']);
    Route::post('/create', ['as' => 'suplier_contact.create', 'uses' => 'SupplierContactController@create']);
    Route::post('/getlist', ['as' => 'suplier_contact.getlist', 'uses' => 'SupplierContactController@getlist']);
    Route::post('/store', ['as' => 'suplier_contact.store', 'uses' => 'SupplierContactController@store']);
    Route::post('/delete', ['as' => 'suplier_contact.delete', 'uses' => 'SupplierContactController@delete']);
});
