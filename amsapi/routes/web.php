<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout','RegistrationController@logout');
Route::get('/role','RegistrationController@newRole');
Route::get('/permission','RegistrationController@permission');


Route::get('/register','RegistrationController@register');
Route::post('/register','RegistrationController@postRegister');

Route::get('/api/login','RegistrationController@login');
Route::post('/api/login','RegistrationController@postLogin');
Route::get('/activate/{email}/{activationCode}','RegistrationController@activateAccount');

Route::get('/forgot-password','RegistrationController@forgotPassword');

Route::post('/forgot-password','RegistrationController@postForgotPassword');

Route::get('/reset-password/{email}/{activationCode}','RegisterLoginPasswordResetController@resetPassword');

Route::post('/reset-password/{email}/{activationCode}','RegisterLoginPasswordResetController@postResetPassword');

