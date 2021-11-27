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

Route::get('/' ,'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

#user
Route::middleware('auth')->group(function(){
    Route::get('dashboard' , 'DashboardController@show');
    Route::get('admin' ,'DashboardController@show');
    Route::get('admin/dashboard' ,'DashboardController@show');
    #user
    Route::middleware('Roles')->group(function(){
        Route::get('admin/user/list' ,'UserController@list');
        Route::get('admin/user/action' ,'UserController@action')->name('user/action');
        Route::get('admin/user/edit/{id}' ,'UserController@edit')->name('user/edit');
        Route::post('admin/user/update/{id}' ,'UserController@update')->name('user/update');
        Route::get('admin/user/delete/{id}' ,'UserController@delete')->name('user/delete');
        Route::get('admin/user/register' ,'UserController@add');
        Route::post('admin/user/store' ,'UserController@store')->name('user/store');
        Route::get('admin/user/change' ,'UserController@change')->name('user/change');
        Route::post('admin/user/changePass' ,'UserController@changePass')->name('user/changePass');
    });


    #page
    Route::get('admin/page/list' ,'PageController@list');
    Route::get('admin/page/add' ,'PageController@add')->middleware('Subcriber');
    Route::post('admin/page/store' ,'PageController@store')->name('page/store')->middleware('Subcriber');
    Route::post('admin/page/action' ,'PageController@action')->name('page/action')->middleware('Author')->middleware('Subcriber');
    Route::get('admin/page/detail' ,'PageController@detail_ajax');
    Route::get('admin/page/edit/{id}' ,'PageController@edit')->name('page/edit')->middleware('Author')->middleware('Subcriber');
    Route::post('admin/page/update/{id}' ,'PageController@update')->name('page/update')->middleware('Author')->middleware('Subcriber');
    Route::get('admin/page/delete/{id}' ,'PageController@delete')->name('page/delete')->middleware('Author')->middleware('Subcriber');

    #post
    Route::get('admin/post/cat/list' ,'PostController@categary');
    Route::post('admin/post/cat/add' ,'PostController@cat_add')->name('post/cat/add')->middleware('Subcriber');
    Route::get('admin/post/cat/edit/{id}' ,'PostController@cat_edit')->name('post/cat/edit')->middleware('Author')->middleware('Subcriber');;
    Route::post('admin/post/cat/update/{id}' ,'PostController@update_cat')->name('cat/update')->middleware('Author')->middleware('Subcriber');;
    Route::get('admin/post/cat/delete/{id}' ,'PostController@delete_cat')->name('cat/delete')->middleware('Author')->middleware('Subcriber');;
    Route::get('admin/post/add' ,'PostController@add')->middleware('Subcriber');
    Route::post('admin/post/store' ,'PostController@store')->name('post/store')->middleware('Subcriber');
    Route::get('admin/post/list' ,'PostController@list');
    Route::get('admin/post/detail' ,'PostController@detail_ajax');
    Route::post('admin/post/action' ,'PostController@action')->name('post/action')->middleware('Author')->middleware('Subcriber');;
    Route::post('admin/post/sort' ,'PostController@sort');
    Route::get('admin/post/edit/{id}' ,'PostController@edit')->name('post/edit')->middleware('Author')->middleware('Subcriber');;
    Route::post('admin/post/update/{id}' ,'PostController@update')->name('post/update')->middleware('Author')->middleware('Subcriber');;
    Route::get('admin/post/delete/{id}' ,'PostController@delete')->name('post/delete')->middleware('Author')->middleware('Subcriber');;

    #Product
    Route::get('admin/product/cat/list' , 'ProductController@cat_list');
    Route::post('admin/product/cat/add' , 'ProductController@cat_add')->name('product/cat/add')->middleware('Subcriber');
    Route::get('admin/product/cat/edit/{id}' , 'ProductController@cat_edit')->name('product/cat/edit')->middleware('Author')->middleware('Subcriber');;
    Route::post('admin/product/cat/update/{id}' , 'ProductController@cat_update')->name('cat/product/update')->middleware('Author')->middleware('Subcriber');;
    Route::get('admin/product/cat/delete/{id}' , 'ProductController@cat_delete')->name('product/cat/delete')->middleware('Author')->middleware('Subcriber');;
    Route::get('admin/product/add' , 'ProductController@add')->middleware('Subcriber');
    Route::post('admin/product/store' , 'ProductController@store')->name('product/store')->middleware('Subcriber');
    Route::get('admin/product/list' , 'ProductController@list');
    Route::post('admin/product/detail' , 'ProductController@detail_ajax');
    Route::post('admin/product/search/ajax' , 'ProductController@search_ajax');
    Route::post('admin/product/action' ,'ProductController@action')->name('product/action')->middleware('Author')->middleware('Subcriber');
    Route::post('admin/product/sort' , 'ProductController@sort_product');
    Route::post('admin/product/by_id' , 'ProductController@list_detail');
    Route::get('admin/product/eidt/{id}' , 'ProductController@edit')->name('admin/product/eidt')->middleware('Author')->middleware('Subcriber');
    Route::get('admin/product/delete/edit' , 'ProductController@delete_edit')->middleware('Author')->middleware('Subcriber');
    Route::post('admin/product/update/{id}' , 'ProductController@update')->name('product/update')->middleware('Author')->middleware('Subcriber');
    Route::get('admin/product/delete/{id}' , 'ProductController@delete')->name('admin/product/delete')->middleware('Author')->middleware('Subcriber');

    #Slide
    Route::get('admin/slider/add' ,'SliderController@add')->middleware('Subcriber');
    Route::post('admin/slider/store' ,'SliderController@store')->name('slider/store')->middleware('Subcriber');
    Route::get('admin/slider/list' ,'SliderController@list');
    Route::post('admin/slider/action' ,'SliderController@action')->name('slider/action')->middleware('Author')->middleware('Subcriber');
    Route::get('admin/slider/eidt/{id}' ,'SliderController@edit')->name('slider/edit')->middleware('Author')->middleware('Subcriber');
    Route::post('admin/slider/update/{id}' ,'SliderController@update')->name('slider/update')->middleware('Author')->middleware('Subcriber');
    Route::get('admin/slider/delete/{id}' ,'SliderController@delete')->name('slider/delete')->middleware('Author')->middleware('Subcriber');

    #role
    Route::get('admin/role/list' ,'RoleController@list');

    #Oder
    Route::get('admin/order/list' , 'OderController@list');
    Route::post('admin/order/action' ,'OderController@action')->name('order/action');
    Route::get('admin/order/delete/{id}' ,'OderController@delete')->name('order/delete');

    // END ADMIN

});

 // cLIENT
 #page
 Route::get('page/{page}' ,'PageController@introduce');

#post
Route::get(' post/blog-kien-thuc' ,'PostController@listPost');
Route::get(' post/{slug}/{id}' ,'PostController@detailPost');

#Product
Route::get(' product/{slug}' ,'ProductController@list_pro');
Route::post('product/ajax/sort' ,'ProductController@ajax_sort');
Route::post('product/ajax/sort/fetch_data' ,'ProductController@fetch_data');
Route::get('product/{slug_parent}/{slug}' ,'ProductController@list_pro_child');
Route::post('product/filter1/ajax' ,'ProductController@filter_child');
Route::post('product/ajax/sort/fetch_data1' ,'ProductController@fetch_data1');
Route::get(' product/{slug}' ,'ProductController@list_pro');
Route::get('san-pham/{slug_parent}/{slug}' ,'ProductController@detail_product');

#Cart
Route::post('cart/add/{id}' ,'CartController@add')->name('cart/add');
Route::get('cart/show' ,'CartController@show');
Route::post('cart/update' ,'CartController@update')->name('cart/update');
Route::get('cart/delete/{id}' ,'CartController@delete')->name('cart/delete');
Route::post('cart/update_ajax' ,'CartController@update_ajax');
Route::post('cart/edit/home' ,'CartController@add_home');

#Oder
Route::post('oder/store' ,'OderController@store')->name('oder/store');
Route::get('order/detail/{id}' ,'OderController@detail')->name('order/detail');
Route::post('order/status/detail/{id}' ,'OderController@detail_status')->name('order/status/detail');
Route::get('order/thanh-cong'  , 'OderController@success');




