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
    return view('landingpage.landingpage');
});
Route::get('/register','AuthController@register');
Route::post('/postregister','AuthController@postregister');

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout')->name('logout');


Route::group(['middleware'=> ['auth','checkRole:1,2,3']], function(){
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/profile','ProfileController@profile')->name('profile');
    Route::get('/adminprofile', 'ProfileController@adminprofile')->name('adminprofile');
    Route::post('/editprofiladmin/{id}','ProfileController@editprofiladmin')->name('editprofiladmin');
    Route::post('/profile/{id}','ProfileController@editprofile');
    Route::get('/securitypassword','AuthController@securitypassword');
    Route::post('/postnewpassword','AuthController@updatePassword');
    
});

Route::group(['middleware'=>['auth','checkRole:1']], function(){
    Route::get('/datainvestor','AdminController@datainvestor')->name('datainvestor');
});

Route::group(['middleware'=>['auth','checkRole:3']],function(){
    Route::get('/datainvestasi','InvestorController@index')->name('datainvestasi');
    Route::get('/profilpeternak/{id}','InvestorController@profilpeternak')->name('profilpeternak');
    Route::post('/penerimaaninvestasi/{id}','InvestorController@penerimaaninvestasi')->name('penerimaaninvestasi');
    Route::get('/laporan','InvestorController@laporan')->name('laporan');
    Route::post('/datalaporanbulanan/{id}','InvestorController@datalaporan')->name('datalaporan');
});

Route::group(['middleware'=> ['auth','checkRole:2']], function(){
    // Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/datapeternak','AuthController@index')->name('tambahdata');
    Route::post('/datapeternakan','PeternakanController@store')->name('datapeternakan');
    Route::get('/peternakan','PeternakanController@index')->name('peternakan');
    Route::post('/updatepeternakan/{id}','PeternakanController@update')->name('updatepeternakan');
    Route::get('/pengajuaninvestasi','PeternakanController@pengajuaninvestasi')->name('pengajuaninvestasi');
    Route::post('/investasi','PeternakanController@buatinvestasi')->name('investasi');
    Route::get('/check','PeternakanController@check')->name('check');
    Route::get('/laporanbulanan','PeternakanController@laporan')->name('laporanbulanan');
    Route::get('/datalaporanbulanan/{id}','PeternakanController@datalaporanbulanan')->name('datalaporanbulanan');
});
