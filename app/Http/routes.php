<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

//Admin Side

Route::get('insert','UserInsertController@insertform');
Route::post('create','UserInsertController@insert');

Route::get('user-list','UserViewController@index');

Route::get('edit-records','UserUpdateController@index');
Route::get('edit/{id}','UserUpdateController@show');
Route::post('edit/{id}','UserUpdateController@edit');

Route::get('delete-user','UserDeleteController@index');
Route::get('delete/{id}','UserDeleteController@destroy');


Route::get('user-update',[
   'middleware' => 'admin',
   'uses' => 'UserUpdateController@index',
]);

Route::get('view-all-iklan',[
   'middleware' => 'admin',
   'uses' => 'IklanController@viewAllIklan',
]);


Route::get('admin', function () {
    return view('admin_panel');
})->middleware('admin');

//Profile Pengguna

Route::get('profile/{id}',[
   'middleware' => 'auth',
   'uses' => 'ProfileController@getProfile',
   'as' => 'profile.index',
]);

Route::post('profile', 'ProfileController@update_avatar');

Route::get('profile/{id}/edit',[
   'middleware' => 'auth',
   'uses' => 'ProfileController@profileEdit',
   'as' => 'profile.edit',
]);

Route::post('profile/{id}/edit',[
   'middleware' => 'auth',
   'uses' => 'ProfileController@edit',
]);

Route::post('profile/{id}/edit',[
   'middleware' => 'auth',
   'uses' => 'ProfileController@edit',
]);

//Iklan

Route::get('pasang',[
   'middleware' => 'auth',
   'uses' => 'IklanController@pasang',
]);

Route::post('pasang',[
   'middleware' => 'auth',
   'uses' => 'IklanController@post',
]);


Route::get('/iklan/{id}',[
   'middleware' => 'auth',
   'uses' => 'IklanController@getIklan',
   'as' => 'iklan.index',
]);

Route::get('/iklanSaya/{id}',[
   'middleware' => 'auth',
   'uses' => 'IklanController@myIklan',
   'as' => 'iklan.saya',
]);

Route::get('/iklan/{id}/edit',[
   'middleware' => 'auth',
   'uses' => 'IklanController@editIklan',
]);

Route::post('/iklan/{id}/edit',[
   'middleware' => 'auth',
   'uses' => 'IklanController@editIklanPost',
   'as' => 'iklan.edit'
]);

Route::get('/verifikasi/{id}/',[
   'middleware' => 'auth',
   'uses' => 'IklanController@verifikasiIklan',
   'as' => 'iklan.verifikasi'
]);

Route::get('/cancel_verifikasi/{id}/',[
   'middleware' => 'auth',
   'uses' => 'IklanController@cancelIklan',
   'as' => 'iklan.cancel'
]);

Route::get('/hapus-iklan/{id}/',[
   'middleware' => 'auth',
   'uses' => 'IklanController@hapusIklan',
   'as' => 'iklan.hapus'
]);

Route::get('/kategori/{apa}',[
   
   'uses' => 'IklanController@kategori',
   'as' => 'iklan.kategori',
]);

Route::get('/cari/{apa}',[
	'middleware' => 'auth',
   'uses' => 'IklanController@cari',
   'as' => 'iklan.cari',
]);

Route::post('/cari',[
   'middleware' => 'auth',
   'uses' => 'IklanController@find',
]);


