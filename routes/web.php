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
// Home
use Illuminate\Support\Facades\Route;

Route::get('/', 'ShopController@index')->name('shop');

Route::get('/danh-muc/{slug}', 'ShopController@getProductsByCategory')->name('shop.category');

Route::get('/chi-tiet-san-pham/{slug}_{id}', 'ShopController@getProduct')->name('shop.product');

Route::get('/detail-product-popup', 'ShopController@detailProduct');

Route::get('/tin-tuc', 'ShopController@getListArticles')->name('shop.article');


// Chi tiet tin tuc
Route::get('/tin-tuc/{slug}_{id}', 'ShopController@getArticle')->name('shop.article.detail');

Route::get('/lien-he', 'ContactController@index')->name('shop.contact');
Route::post('/gui-lien-he','ContactController@store')->name('shop.saveContact');
// Admin
Route::get('/admin', 'AdminController@index')->name('dashboard')->middleware('CheckLogin');

Route::resource('roles', 'RoleController');

Route::get('/gio-hang', 'CartController@index')->name('shop.cart')->middleware('cors');

Route::post('/them-sp-vao-gio-hang', 'CartController@addToCart')->name('shop.cart.add-to-cart');

Route::get('/dat-hang/xoa-sp-gio-hang', 'CartController@removeToCart')->name('shop.cart.remove-to-cart');

Route::get('/dat-hang/cap-nhat-gio-hang', 'CartController@updateToCart')->name('shop.cart.update-to-cart');

Route::get('/thanh-toan', 'CartController@checkout')->name('shop.cart.checkout');

Route::post('/thanh-toan', 'CartController@postCheckout')->name('shop.cart.Postcheckout');

// Đăng nhập
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
// Đăng xuất
Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');

Route::get('/admin/registerForm', 'AdminController@registerForm')->name('admin.registerForm');

Route::post('/admin/register', 'AdminController@register')->name('admin.register');

Route::post('/admin/postLogin', 'AdminController@postLogin')->name('admin.postLogin');

// Gom nhóm route trang admin . thêm tiền tố admin cho mỗi url
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'CheckLogin'], function () {
    Route::resource('banner', 'BannerController');
    Route::resource('brand', 'BrandController'); // Thuong Hieu
    Route::resource('vendor', 'VendorController'); // Nhà cung cấp
    Route::resource('category', 'CategoryController'); // Nhà cung cấp
    Route::resource('product', 'ProductController');// San Pham
    Route::resource('setting', 'SettingController');
    Route::resource('article', 'ArticleController');
});


