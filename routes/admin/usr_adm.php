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

Route::group(['prefix' => 'usr_adm', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Administrator' ], function() {
    Route::get('/', ['as' => 'Administratif User', 'uses' => 'UsersAdmController@index']);

    Route::post('/lokasiType', ['as' => 'lokasi.type', 'uses' => 'UsersAdmController@lokasiType']);

});
