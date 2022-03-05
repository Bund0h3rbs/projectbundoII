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

    Route::post('/create', ['as' => 'usr_adm.create', 'uses' => 'UsersAdmController@create']);
    Route::post('/getlist',['as' => 'usr_adm.getlist', 'uses' => 'UsersAdmController@getlist']);
    Route::post('/store',  ['as' => 'usr_adm.store', 'uses' => 'UsersAdmController@store']);
    Route::post('/delete', ['as' => 'usr_adm.delete', 'uses' => 'UsersAdmController@delete']);

});
