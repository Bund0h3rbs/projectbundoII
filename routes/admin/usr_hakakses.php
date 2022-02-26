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

Route::group(['prefix' => 'usr_hakakses', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Administrator' ], function() {
    Route::get('/', ['as' => 'Hak Akses User', 'uses' => 'UsersHakAksesController@index']);

    Route::post('/lokasiType', ['as' => 'lokasi.type', 'uses' => 'UsersHakAksesController@lokasiType']);

});
