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
    return view('auth.login');
});
Route::get('/register','AuthController@register');
Route::post('/postregister','AuthController@postregister');

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout')->name('logout');

Route::group(['middleware'=> ['auth','checkRole:1,2,3']], function(){
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/profile','ProfileController@profile')->name('profile');
    Route::post('/profile/{id}','ProfileController@editprofile');
    Route::get('/securitypassword','AuthController@securitypassword');
    Route::post('/postnewpassword','AuthController@updatePassword');
    
});

Route::group(['middleware'=> ['auth','checkRole:2']], function(){
    // Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/datapeternak','AuthController@index')->name('tambahdata');
    Route::post('/datapeternakan','PeternakanController@store')->name('datapeternakan');
    Route::get('/peternakan','PeternakanController@index')->name('peternakan');
    Route::post('/updatepeternakan/{id}','PeternakanController@update')->name('updatepeternakan');
});
