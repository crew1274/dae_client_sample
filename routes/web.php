<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('home', 'DashboardController@index');

Route::get('/', function () {
    return view('welcome'); });

Route::get('dashboard', 'DashboardController@index');

Route::get('record', 'RecordController@index');

Route::get('network', 'NetworkController@index');
Route::get('network/wifi', 'WifiController@index');
Route::post('network/wifi', ['as' => 'wifi', 'uses' => 'WifiController@wifi']);
Route::get('network/static', 'StaticipController@index');
Route::post('network/static' ,['as' => 'static', 'uses' => 'StaticipController@static_ip']);
Route::get('network/dhcp', 'DhcpController@index');
Route::post('network/dhcp', ['as' => 'dhcp', 'uses' => 'DhcpController@dhcp']);


Route::get('table', 'TableController@index');

Route::resource('setting','SettingController');

Route::resource('config','ConfigController');

Route::get('profile', 'ProfileController@index');
Route::post('profile', 'ProfileController@update');

Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);



Route::get('/blank', function()
{
	return View::make('blank');
});



Auth::routes();
