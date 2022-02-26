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

Route::group(['prefix' => 'klien_list', 'middleware' => ['auth'], 'namespace'=>'App\Http\Controllers\Administrator' ], function() {
    Route::get('/', ['as' => 'Klien', 'uses' => 'KlienController@index']);

    Route::post('/clientlist', ['as' => 'klien.getlist', 'uses' => 'KlienController@getlist']);
    Route::post('/clientAdd', ['as' => 'klien.add', 'uses' => 'KlienController@clientAdd']);

});
