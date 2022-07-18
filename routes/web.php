<?php

use Illuminate\Support\Facades\Route;

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

Route::get('', 'frontend\IndexController@GetIndex');
Route::get('about', 'frontend\IndexController@GetAbout');
Route::get('contact', 'frontend\IndexController@GetContact');
Route::get('{slug_cate}.html', 'frontend\IndexController@GetPrdCate');
Route::get('filter', 'frontend\IndexController@Getfilter');

Route::group(['prefix' => 'cart'], function(){
	Route::get('', 'frontend\CartController@GetCart');
	Route::get('add', 'frontend\CartController@AddCart');
	Route::get('update/{rowId}/{qty}', 'frontend\CartController@UpdateCart');
	Route::get('delete/{rowId}', 'frontend\CartController@DelCart');
});
Route::group(['prefix' => 'product'], function(){
	Route::get('{slug_prd}.html', 'frontend\ProductController@GetDetail');
	Route::get('shop', 'frontend\ProductController@GetShop');
});
Route::group(['prefix' => 'checkout'], function(){
	Route::get('', 'frontend\CheckoutController@GetCheckout');
	Route::post('', 'frontend\CheckoutController@PostCheckout');
	Route::get('complete/{order_id}', 'frontend\CheckoutController@GetComplete');
});

Route::get('login', 'backend\LoginController@GetLogin')->middleware('CheckLogout');
Route::post('login', 'backend\LoginController@PostLogin');
Route::group(['prefix' => 'admin', 'middleware' => 'CheckLogin'], function(){
	Route::get('', 'backend\IndexController@GetIndex');
	Route::get('logout', 'backend\IndexController@Logout');

	Route::group(['prefix' => 'category'], function(){
		Route::get('', 'backend\CategoryController@GetCategory');
		Route::post('', 'backend\CategoryController@PostCategory');
		Route::get('edit/{id_category}', 'backend\CategoryController@GetEditCategory');
		Route::post('edit/{id_category}', 'backend\CategoryController@PostEditCategory');
		Route::get('del/{id_category}', 'backend\CategoryController@GetDelCategory');
	});
	Route::group(['prefix' => 'order'], function(){
		Route::get('', 'backend\OrderController@GetOrder');
		Route::get('detail/{id_order}', 'backend\OrderController@GetDetail');
		Route::get('paid/{id_order}', 'backend\OrderController@paid');
        Route::get('cancel/{id_order}', 'backend\OrderController@cancel');
		Route::get('processed', 'backend\OrderController@GetProcessed');
        Route::get('cancel', 'backend\OrderController@GetCancel');
	});
	Route::group(['prefix' => 'product'], function(){
		Route::get('', 'backend\ProductController@GetProduct');
		Route::get('add', 'backend\ProductController@GetAddProduct');
		Route::post('add', 'backend\ProductController@PostAddProduct');
		Route::get('edit/{id_product}', 'backend\ProductController@GetEditProduct');
		Route::post('edit/{id_product}', 'backend\ProductController@PostEditProduct');
		Route::get('delete/{id_product}', 'backend\ProductController@DeleteProduct');
	});
    Route::group(['prefix' => 'attributes'], function(){
		Route::get('', 'backend\AttributesController@GetAttributes');
		Route::get('add', 'backend\AttributesController@GetAddAttributes');
		Route::post('add', 'backend\AttributesController@PostAddAttributes');
		Route::get('edit/{id_attributes}', 'backend\AttributesController@GetEditAttributes');
		Route::post('edit/{id_attributes}', 'backend\AttributesController@PostEditAttributes');
		Route::get('delete/{id_attributes}', 'backend\AttributesController@DeleteAttributes');
	});
	Route::group(['prefix' => 'user'], function(){
		Route::get('', 'backend\UserController@GetUser');
		Route::get('add', 'backend\UserController@GetAddUser');
		Route::post('add', 'backend\UserController@PostAddUser');
		Route::get('edit/{id_user}', 'backend\UserController@GetEditUser');
		Route::post('edit/{id_user}', 'backend\UserController@PostEditUser');
		Route::get('delete/{id_user}', 'backend\UserController@DeleteUser');
	});
});
