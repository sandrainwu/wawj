<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whichs
| contains the "web" middleware group. Now create something great!
|
*/
Route::pattern('id', '[0-9]+');
Route::pattern('pageno', '[0-9]+');

Route::get('auth/weixin', 'Auth\WeixinController@redirectToProvider');
Route::get('auth/weixin/callback', 'Auth\WeixinController@handleProviderCallback');
//Route::get('/auth/oauth', 'Auth\AuthController@oauth');
//Route::get('/auth/callback', 'Auth\AuthController@callback');

Route::view('/', 'index')->name('/');
Auth::routes();
Route::get('logout/{guardname}', 'Auth\LoginController@logout')->where('guardname', '[a-z]+')->name('logout');

Route::prefix('comm')->group(function () {
	Route::get('agencyDetail/{id?}', 'CommonController@agencyDetailAjax')->name('agencyDetail');
	Route::get('agentDetail/{id?}', 'CommonController@agentDetailAjax')->name('agentDetail');
	Route::get('message/{id}', 'CommonController@messageDetailAjax')->name('message');
	Route::put('message/{id}', 'CommonController@messageReplyAjax');
	Route::delete('message/{id}', 'CommonController@messageDeleteAjax');
	Route::get('changePassword', 'CommonController@changePassword')->name('changePassword');
	Route::post('changePassword', 'CommonController@changePasswordAjax');
});

Route::prefix('agent')->group(function () {
	Route::get('/', 'AgentController@HomeOfAgent')->name('agentHome');
	Route::get('buyHouse', 'AgentController@buyHouse')->name('agentBuyHouse');
    Route::get('clientMessage', 'AgentController@ClientMessage')->name('clientMessage');
    Route::get('joinAgency', 'AgentController@joinAgency')->name('agentJoinAgency');
    Route::post('joinAgency', 'AgentController@joinAgencySubmitAjax');
    Route::put('joinAgency', 'AgentController@joinAgencyWithdrawAjax');
	Route::get('userDetail/{id?}', 'AgentController@userDetail')->name('userDetail');
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
	Route::get('saleHouseEdit/{id}', 'UserController@saleHouseEdit')->name('userSaleHouseEdit');
	Route::get('buyHouseEdit/{id}', 'UserController@buyHouseEdit')->name('userBuyHouseEdit');
	Route::get('rentHouseEdit/{id}', 'UserController@rentHouseEdit')->name('userRentHouseEdit');
	Route::get('letHouseEdit/{id}', 'UserController@letHouseEdit')->name('userLetHouseEdit');
	Route::post('transactionSave', 'UserController@transactionSave')->name('userTransactionSave');
	Route::get('searchAgency', 'UserController@searchAgency')->name('searchAgency');
    Route::get('searchAgent', 'UserController@searchAgent')->name('searchAgent');
	Route::get('searchPost', 'UserController@searchPost')->name('searchPost');
	Route::get('transactionDetail/{id?}', 'UserController@transactionDetail')->name('transactionDetail');
	Route::get('bindAgentTransaction', 'UserController@bindAgentTransaction')->name('bindAgentTransaction');
});

Route::prefix('admin')->group(function () {
	Route::get('login', 'Auth\LoginController@showLoginFormAdmin');
	Route::get('/', 'AdminController@HomeOfAdmin')->name('adminHome');
	Route::get('manage/{table}/{id?}/{pageno?}', 'CrudController@index')->name('manageTable');//列表
	Route::post('manage/{table}/', 'CrudController@create');//新增
	Route::delete('manage/{table}/{id?}', 'CrudController@destroy');//删除
	Route::patch('manage/{table}/{id?}', 'CrudController@update');//修改
	Route::put('manage/{table}', 'CrudController@search');//查询
	
});
