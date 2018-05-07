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

Route::get('/', 'UserController@home');
/////////////////////////////////////////////////////////
Route::get('/masuk', function(){return view('auth.login');})->middleware('guest');
Route::post('/signin', 'AuthController@masuk');
Route::get('logout', 'AuthController@keluar');
//////////////////////Auth//////////////////////////////
Route::get('/daftar', function(){return view('auth.register');})->middleware('guest');
Route::post('/regist', 'AuthController@daftar');
///////////////////////USER//////////////////////////////////
Route::get('/home', 'UserController@home')->middleware('auth:users');
Route::get('/donasi', 'UserController@load')->middleware('auth:users');
Route::get('/dashboard', function(){return view('user.dashboard');})->middleware('auth:users');
Route::get('/{id}/profile', 'UserController@profile')->middleware('auth:users');
////////////////////////////////////////////////////////////
Route::get('/{id}/form donasi', 'DonasiController@donasi')->middleware('auth:users');
Route::post('/donasikan', 'DonasiController@donasikan');
Route::get('/data donasi/{iduser}', 'DonasiController@tabel')->middleware('auth:users');
Route::get('/{idDonasi}/konfirmasi donasi', 'DonasiController@konfirm')->middleware('auth:users');
Route::post('/konfirmasi/{idDonasi}/{idUser}', 'DonasiController@simpankonfirm')->middleware('auth:users');
////////////////////////////////////////////////////////////
Route::get('/galang dana', function(){return view('galangdana.form_galang_dana');})->middleware('auth:users');
Route::post('{idUser}/simpan galang', 'GalangController@tambah');
Route::get('/{id}/edit galang dana', 'GalangController@edit')->middleware('auth:users');
Route::post('/{idDonasi}/{idUser}/update galang', 'GalangController@update');
Route::get('/data galang/{idGalang}/', 'GalangController@tabel')->middleware('auth:users');
////////////////////////////////////////////////////////////

/////////////////////////////ADMIN/////////////////////////////////
Route::get('/home admin', 'AdminController@home')->middleware('auth:admins');
Route::get('/data galang', 'AdminController@galang')->middleware('auth:admins');
Route::get('{id}/deleteGalang', 'AdminController@hapusGalang')->middleware('auth:admins');
Route::get('/data donasi', 'AdminController@donasi')->middleware('auth:admins');
Route::get('/validasi/{id}', 'AdminController@validasi')->middleware('auth:admins');
Route::get('/data user', 'AdminController@user')->middleware('auth:admins');
Route::get('{id}/deleteUser', 'AdminController@hapusUser')->middleware('auth:admins');