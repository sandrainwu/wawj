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

Route::view('/', 'index')->name('/');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('userLogout');
Route::get('agentLogout', 'Auth\LoginController@agentLogout')->name('agentLogout');

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('agencyInfo/{id}', 'PublicController@agencyInfo')->name('agencyInfo');
Route::get('agencyInfo', 'PublicController@agencyInfo')->name('agencyInfo1'); //fake name
Route::get('agentInfo/{id}', 'PublicController@agentInfo')->name('agentInfo');
Route::get('agentInfo', 'PublicController@agentInfo')->name('agentInfo1'); //fake name


Route::prefix('agent')->group(function () {
	Route::get('/', 'AgentController@HomeOfAgent')->name('agentHome');
	Route::get('buyHouse', 'AgentController@buyHouse')->name('agentBuyHouse');
    Route::get('getClientMessage', 'AgentController@getClientMessage')->name('getClientMessage');
    Route::get('joinAgency', 'AgentController@joinAgency')->name('agentJoinAgency');
    Route::post('joinAgency', 'AgentController@joinAgencySubmit');
    Route::put('joinAgency', 'AgentController@joinAgencyDrawback');
});


Route::prefix('user')->group(function () {
	Route::get('/', 'UserController@HomeOfUser')->name('userHome');
    Route::get('buyHouse', 'UserController@buyHouse')->name('userBuyHouse');
    Route::get('saleHouse', 'UserController@saleHouse')->name('userSaleHouse');
	Route::get('rentHouse', 'UserController@rentHouse')->name('userRentHouse');
    Route::get('letHouse', 'UserController@letHouse')->name('userLetHouse');
	Route::get('employAgent', 'UserController@employAgent')->name('userEmployAgent');
	Route::get('postList', 'UserController@postList')->name('userPostList');
	Route::post('postList', 'UserController@postListDelete');
	Route::get('saleHouseEdit/{id}', 'UserController@saleHouseEdit')->where('id', '[0-9]+')->name('userSaleHouseEdit');
	Route::get('buyHouseEdit/{id}', 'UserController@buyHouseEdit')->where('id', '[0-9]+')->name('userBuyHouseEdit');
	Route::get('rentHouseEdit/{id}', 'UserController@rentHouseEdit')->where('id', '[0-9]+')->name('userRentHouseEdit');
	Route::get('letHouseEdit/{id}', 'UserController@letHouseEdit')->where('id', '[0-9]+')->name('userLetHouseEdit');
	Route::post('transactionSave', 'UserController@transactionSave')->name('userTransactionSave');
	Route::get('searchAgency', 'UserController@searchAgency')->name('searchAgency');
    Route::get('searchAgent', 'UserController@searchAgent')->name('searchAgent');
	Route::get('searchPost', 'UserController@searchpost')->name('searchPost');
	Route::get('postInfo/{id}', 'UserController@postInfo')->where('id', '[0-9]+')->name('postInfo');
	Route::get('postInfo', 'UserController@postInfo')->name('postInfo1');//fake name
	Route::get('bindAgentTransaction', 'UserController@bindAgentTransaction')->name('bindAgentTransaction');

});
