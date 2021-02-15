<?php

use Illuminate\Http\Request;

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

//Gallery
// Route::prefix('api')->middleware(['auth:api'])->group(function() {

// 	Route::post('/gallerys','GalleryController@index');

// });
Route::prefix('api')->group(function () {

	Route::prefix('gallery')->middleware(['auth:api'])->group(function() {
	
		Route::get('/list','GalleryController@index');
		Route::post('/','GalleryController@store');
		Route::put('/{id}','GalleryController@store');
		Route::delete('/{id}','GalleryController@destroy');
		Route::get('detail/{id}','GalleryController@detail');
	
	});
});


//Gallery Content

// Route::prefix('api')->middleware(['auth:api'])->group(function() {

// 	Route::post('/gcontents','GalleryContentController@index');

// });

// Route::prefix('gcontent')->middleware(['auth:api'])->group(function() {

// 	Route::post('/','GalleryContentController@store');
// 	Route::put('/','GalleryContentController@store');
// 	Route::delete('/{id}','GalleryContentController@destroy');

// });
