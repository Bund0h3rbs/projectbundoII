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

Route::group(['prefix' => 'lokasi', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Administrator' ], function() {
    Route::get('/', ['as' => 'Administratif', 'uses' => 'LokasiController@index']);
    
    Route::post('/lokasiType', ['as' => 'lokasi.type', 'uses' => 'LokasiController@lokasiType']);
    
});
