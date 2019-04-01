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

Route::get('/', 'HomeController@index');

Route::get('/flight-list','FlightListController@flight_list')->name('flight-list');

Route::get('/flight-detail/{fl_id}','FlightDetailController@flight_detail')->name('flight-detail');

Route::get('/flight-book','FlightBookController@flight_book')->name('flight-book');

Route::get('/register', 'UserController@register')->name('register');
Route::post('/register', 'UserController@postRegister')->name('register-post');

Route::get('/edt-inf', 'UserController@editInfor')->name('edt-inf');
Route::post('/edt-inf', 'UserController@post_editInfor')->name('edt-inf-post');

Route::get('/log_in', 'UserController@login')->name('log_in');
Route::post('/log_in', 'UserController@postLogin')->name('log_in');

Route::get('/log_out', 'UserController@logout')->name('log_out');

Route::get('/city_list', 'CityController@index')->name('city_list');

Route::get('/airline_list', 'AirlineController@index')->name('airline_list');

Route::get('/flight_infor','CreateFlightController@flight_infor')->name('flight_infor');
Route::post('/flight_infor','CreateFlightController@flight_create')->name('flight_create');
//
//Auth::routes();
//Route::get('/home', 'HomeController@index');
//
////acl
//Route::group(['middleware' => ['admin_logged', 'can_see']], function () {
//    Route::group(['prefix' => '/admin/res', 'middleware' => array('can_see')], function () {
//        Route::get('/list', 'ResController@index')->name('list-res');
//        Route::get('/create', 'ResController@create')->name('create-res');
//        Route::get('/edit/{res_id}', 'ResController@edit')->name('edit-res');
//        Route::get('/destroy/{res_id}', 'ResController@destroy')->name('destroy-res');
//        Route::post('/store', 'ResController@store')->name('store-res');
//        Route::post('/update', 'ResController@update')->name('update-res');
//    });
//});