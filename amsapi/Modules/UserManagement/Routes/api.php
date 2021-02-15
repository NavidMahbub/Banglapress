<?php

use Illuminate\Http\Request;
use Modules\ContentManager\Entities\User ;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/usermanagement', function (Request $request) {
//     return $request->user();
// });

Route::prefix('role')->middleware('auth:api')->group(function(){
    Route::get('/','RoleController@index');
    Route::post('/','RoleController@store');
    Route::put('/','RoleController@update');
    Route::delete('/{id}','RoleController@destroy');
});

Route::prefix('user')->middleware('auth:api')->group(function(){
	Route::get('/list','UserManagementController@index');
    Route::post('/','UserManagementController@create');
    Route::put('/{id}','UserManagementController@update');
    Route::delete('/{id}','UserManagementController@destroy');

    Route::get('/permission','UserManagementController@user_permission');
});