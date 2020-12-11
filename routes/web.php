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

use Gloudemans\Shoppingcart\Facades\Cart;

Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
Route::get('/refresh', 'HomeController@Cartdestroy')->name('Cartdestroy');
Route::get('/shop', 'HomeController@shop')->name('shop');
Route::get('/gallery', 'GalleryImageController@index')->name('gallery');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/product/{slug}', 'HomeController@product')->name('product');
Route::get('/cart', 'HomeController@cart')->name('cart');
Route::get('/checkout', 'HomeController@checkout')->name('checkout');
Route::get('/thankYou/{id}', 'HomeController@thankYou')->name('thankYou');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/event', 'HomeController@event')->name('event');
Route::get('/category/{categoryName}', 'CategoryController@show')->name('category.show');


//Contact Us

Route::post('/message', 'MessageController@store')->name('message.store');

// Cart

Route::get('/track', 'HomeController@track');
Route::post('/track', 'HomeController@trackshow')->name('trackshow');
Route::post('/add/cart', 'ProductController@addToCart');
Route::post('/update/cart', 'ProductController@updateCart');
Route::post('/checkout', 'TransactionController@checkout')->name('checkout');
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::post('/coupon', 'discountController@store')->name('discount.store');
Route::post('/search', 'HomeController@search')->name('search.products');

//Subscribers

Route::post('/Subscribe', 'HomeController@Subscribe')->name('SubscribeBtn');

Route::delete('/delete/{id}', 'ProductController@destroyInCart')->name('delete.cart');

// Route::get('/mailable', function () {
//     $Customer = App\Customer::find(1);
//     $orderDetails = [
//         'sumTotal' => 20000,
//         'deliverCarge' => 1000,
//         'transactionRef' =>123456,
//         'cartContent' => Cart::instance('shopping')->content(),
//     ];
//     // $cartContent =;
//     return new App\Mail\invoiceMail( $Customer, $orderDetails);
// });

// Blog

Route::get('/blog/{id}', 'HomeController@blogShow')->name('blogShow');

//Admin

Route::group(['prefix' => 'api'], function () {

    Route::get('/product', 'ProductController@fetchAll');
    Route::get('/product/{count}', 'ProductController@pick');
    Route::get('/product/byBrand/{brand}', 'ProductController@fetchProductByBrand');
    Route::get('/product/byCategory/{category}', 'ProductController@fetchProductByCategory');
    Route::get('/product/byGender/{gender}', 'ProductController@fetchProductByGender');
    Route::get('/all/category', 'ProductController@fetchAllCategory');
    Route::get('/all/brand', 'ProductController@fetchAllBrand');
    Route::post('/add/cart', 'ProductController@addToCart');


});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('/add/product', 'AdminController@create')->name('admin.create');
    Route::get('/add/product/{slug}', 'AdminController@edit')->name('admin.edit');
    Route::get('/product/list', 'AdminController@products_all')->name('admin.products_all');
    Route::post('/add/product', 'AdminController@store')->name('admin.store');
    Route::put('/add/product/{id}', 'AdminController@update')->name('admin.update');
    Route::get('/product/brand-and-category', 'AdminController@createBAC')->name('admin.createBAC');
    Route::post('/product/brand-and-category/category', 'AdminController@createCategory')->name('admin.createCategory');
    Route::post('/product/brand-and-category/Brand', 'AdminController@createBrand')->name('admin.createBrand');

    Route::get('/Order', 'AdminController@Order')->name('admin.Order');
    Route::post('/Order/customer/{id}', 'AdminController@customerDetails')->name('admin.customerDetails');
    Route::get('/coupon', 'AdminController@discount')->name('coupon.index');
    Route::post('/coupon', 'discountController@create')->name('coupon.create');

    // Message 

    Route::get('/inbox', 'MessageController@index')->name('message.index');
    Route::get('/inbox/{id}', 'MessageController@show')->name('message.show');
    Route::post('/inbox', 'MessageController@update')->name('message.update');
    Route::delete('/inbox/{id}', 'MessageController@destroy')->name('message.destroy');

    Route::post('/gallery', 'GalleryImageController@store')->name('GalleryImage.store');


    Route::post('/Testimony', 'AdminController@Testimony')->name('admin.Testimony');

    Route::DELETE('/add/product/{id}', 'AdminController@destroy')->name('admin.destroy');
    // Blog

    Route::get('/add/blog', 'blogController@index')->name('blog.index');
    Route::get('/Blog/edit/{id}', 'blogController@edit')->name('blog.edit');
    Route::get('/Blog/list', 'blogController@show')->name('blog.show');
    Route::post('/add/blog', 'blogController@store')->name('blog.store');
    Route::put('/edit/blog/{id}', 'blogController@update')->name('blog.update');
    Route::delete('/delete/blog/{id}', 'blogController@destroy')->name('blog.destroy');
    Route::post('/category/add', 'CategoryController@store')->name('category.store');
    Route::post('/tags/add', 'CategoryController@tags_store')->name('blog.tags_store');


    Route::post('/Transaction/update/{id}', 'TransactionController@update');
});