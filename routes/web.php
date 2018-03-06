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

Route::view('/', 'auth.login')->name('/');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('agent')->group(function () {
	Route::get('/', 'AgentController@HomeOfAgent')->name('agent');

});


Route::prefix('user')->group(function () {
	Route::get('/', 'UserController@HomeOfUser')->name('user');
    Route::get('buyHouse', 'UserController@buyHouse')->name('buyHouse');
    Route::get('saleHouse', 'UserController@saleHouse')->name('saleHouse');
	Route::get('postList/{id}', 'UserController@postList')->where('id', '[0-9]+')->name('postList');
	Route::get('saleHouseEdit/{id}', 'UserController@saleHouseEdit')->where('id', '[0-9]+')->name('saleHouseEdit');
	Route::post('saleHouseSave', 'UserController@saleHouseSave')->name('saleHouseSave');
});
