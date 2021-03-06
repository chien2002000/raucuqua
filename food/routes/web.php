<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

#user
Route::middleware('auth')->group(function(){
    Route::get('dashboard' , 'DashboardController@show');
    Route::get('admin' ,'DashboardController@show');
    #user
    Route::get('admin/user/list' ,'UserController@list');
    Route::get('admin/user/action' ,'UserController@action')->name('user/action');
    Route::get('admin/user/edit/{id}' ,'UserController@edit')->name('user/edit');
    Route::post('admin/user/update/{id}' ,'UserController@update')->name('user/update');
    Route::get('admin/user/delete/{id}' ,'UserController@delete')->name('user/delete');
    Route::get('admin/user/register' ,'UserController@add');
    Route::post('admin/user/store' ,'UserController@store')->name('user/store');
    Route::get('admin/user/change' ,'UserController@change')->name('user/change');
    Route::post('admin/user/changePass' ,'UserController@changePass')->name('user/changePass');

    #page
    Route::get('admin/page/list' ,'PageController@list');
    Route::get('admin/page/add' ,'PageController@add');
    Route::post('admin/page/store' ,'PageController@store')->name('page/store');
    Route::post('admin/page/action' ,'PageController@action')->name('page/action');
    Route::get('admin/page/detail' ,'PageController@detail_ajax');
    Route::get('admin/page/edit/{id}' ,'PageController@edit')->name('page/edit');
    Route::post('admin/page/update/{id}' ,'PageController@update')->name('page/update');
    Route::get('admin/page/delete/{id}' ,'PageController@delete')->name('page/delete');
});

