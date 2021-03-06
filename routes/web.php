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
Route::get('/back','AuthController@back')->name('back');
Route::get('/register','AuthController@register')->name('register');
Route::post('/postregister','AuthController@postregister');
Route::get('/forgotpassword','AuthController@forgotpasswordview')->name('viewforgotpassword');
Route::post('/resetpassword','AuthController@resetpassword')->name('resetpassword');
// Route::PUT('/ressetpassword','AuthController@resetpassword')->name('reset');
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout')->name('logout');
Route::get('/datalaporanbulanan{id}/logout','AuthController@logout')->name('logout');


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
    Route::get('/datauser','AdminController@datauser')->name('datauser');
    Route::get('/admindatapeternak','AdminController@adminpeternakan')->name('adminpeternak');
    Route::get('/detailpeternak','AdminController@detailpeternak')->name('detailpeternak');
    Route::get('/perjanjian','AdminController@uploadSuratPerjanjianView')->name('uploadperjanjian');
    Route::post('/submitperjanjian','AdminController@uploadSuratPerjanjian')->name('submitperjanjian');
    Route::get('/konfirmasi','AdminController@konfirmasi')->name('konfirmasi');
    Route::get('/konfirmasistatus/{id}','AdminController@konfirmasistatus')->name('konfirmasistatus');
    Route::get('/search','AdminController@search')->name('search');
});

Route::group(['middleware'=>['auth','checkRole:3']],function(){
    Route::get('/datainvestasi','InvestorController@index')->name('datainvestasi');
    Route::get('/profilpeternak/{id}','InvestorController@profilpeternak')->name('profilpeternak');
    Route::post('/penerimaaninvestasi/{id}','InvestorController@penerimaaninvestasi')->name('penerimaaninvestasi');
    Route::get('/laporan','InvestorController@laporan')->name('laporan');
    Route::get('/laporanbulanan/{id}','InvestorController@datalaporan')->name('datalaporaninvestor');
    Route::get('/penipuan', 'PenipuanController@index')->name('penipuan');
    Route::get('/formPenipuan', 'PenipuanController@create')->name('formpenipuan');
    // Route::get('/datalaporanbulanan/{id}','InvestorController@datalaporan')->name('datalaporaninvestor');
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
    Route::get('/formLaporanBulanan' , 'LaporanBulananController@index')->name('formlaporan');
    Route::post('/formLaporanBulanan', 'LaporanBulananController@store')->name('storeform');
    Route::get('/formLaporanBulanan/{id}', 'LaporanBulananController@show')->name('showLaporan');
});
