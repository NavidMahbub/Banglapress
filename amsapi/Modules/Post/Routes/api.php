<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Post\Entities\PostTag;
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


//Route::prefix('api')->group(function() {
//
//	Route::get('/posts','PostController@index');
//
//});

//Route::get('/frontend/posts','PostController@index');
//Route::get('/frontend/categories','PostController@postCategory');

Route::prefix('post')->middleware('auth:api')->group(function(){
    Route::get('/list','PostController@index');
    Route::get('/{id}','PostController@detail');
    Route::post('/','PostController@create');
    Route::put('/{id}','PostController@update');
    Route::delete('/{id}','PostController@destroy');

    Route::get('/reporter/list','PostController@reporterNews');
});
// poll 
Route::prefix('poll')->middleware(['auth:api'])->group(function(){
    Route::get('list','PollController@index');
    Route::post('/','PollController@store');
    Route::put('/','PollController@store');
    Route::delete('/{id}','PollController@destroy');
});
//Route::prefix('post')->middleware('auth:api')->group(function(){
//    Route::get('/list','PostController@index');
//    Route::get('/{id}','PostController@detail');
//    Route::post('/','PostController@create');
//    Route::put('/{id}','PostController@update');
//    Route::delete('/{id}','PostController@destroy');
//});
// Route::prefix('tag')->middleware('auth:api')->group(function(){
//     Route::get('/list',function(){
//         return PostTag::all();
//     });

// });
//Route::middleware('auth:api')->get('/post', function (Request $request) {
//    return $request->user();
//});
