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

Route::get('/', '\App\Http\Controllers\HomeController@index')->name("home.index");

Route::get('about', '\App\Http\Controllers\HomeController@about')->name("home.about");

Route::get('/products', '\App\Http\Controllers\ProductController@index')->name("product.index");

Route::get('/products/{id}', '\App\Http\Controllers\ProductController@show')->name("product.show");


Route::middleware('admin')->prefix('/admin')->group(function() {

//Route::get('/admin', '\App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
Route::get('/', '\App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");

//Route::get('/admin/products', '\App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
Route::get('/products', '\App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");

//Route::post('/admin/products/store', '\App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
Route::post('/products/store', '\App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");

Route::get('/products/create', '\App\Http\Controllers\Admin\AdminProductController@create')->name("admin.product.create");

Route::delete('/products/{id}/delete', '\App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");

Route::get('/products/{id}/edit', '\App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");

Route::put('/products/{id}/update', '\App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");


});



Auth::routes();



Route::get('/cart', '\App\Http\Controllers\cartController@index')->name("cart.index");

Route::get('/cart/delet', '\App\Http\Controllers\cartController@delete')->name("cart.delete");

Route::post('/cart/delet{id}', '\App\Http\Controllers\cartController@add')->name("cart.add");

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function()
{
    Route::get('/cart/purchase', '\App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders','\App\Http\Controllers\CartController@purchase')->name("myaccount.orders");
});

Route::get('/{locale?}', function ($locale=null)
{
    if(isset($locale) && in_array($locale, config('app.available_locales')))
    {
        app()->setLocale($locale);
    }
    $viewData = [];
    $viewData['title'] = "Home Page - online store";
    return view('home.index')->with("viewData", $viewData);
});
Route::get('language/{locale}', '\App\Http\Controllers\LocalizationController@changeLocale')->name("locale");