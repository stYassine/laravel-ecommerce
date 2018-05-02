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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//////////////////////
/// Dashboard
//////////////////////
Route::group(['prefix' => 'admin'], function(){
    
    Route::get('/', [
        'uses' => 'AdminController@index',
        'as' => 'admin'
    ]);
    
    Route::resource('products', 'ProductsController');    
    
    
});


//////////////////////
/// Public
//////////////////////

/// main page
Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'index'
]);
/// single product
Route::get('/single/{id}', [
    'uses' => 'HomeController@single',
    'as' => 'single'
]);
/// cart page
Route::get('/cart', [
    'uses' => 'HomeController@cart',
    'as' => 'cart'
]);
/// checkout page
Route::get('/checkout', [
    'uses' => 'HomeController@checkout',
    'as' => 'checkout'
]);



//////////////////////
/// Shopping Cart
//////////////////////

/// add to cart
Route::post('/cart/add', [
    'uses' => 'ShoppingController@add',
    'as' => 'cart.add'
]);
/// RAPID add to cart
Route::get('/cart/rapidAdd/{id}', [
    'uses' => 'ShoppingController@rapid_add',
    'as' => 'cart.rapid_add'
]);

/// Increase
Route::get('/cart/increase/{id}/{qty}', [
    'uses' => 'ShoppingController@increase',
    'as' => 'cart.increase'
]);
/// Descrease
Route::get('/cart/decrease/{id}/{qty}', [
    'uses' => 'ShoppingController@decrease',
    'as' => 'cart.decrease'
]);
/// remove item
Route::get('/cart/remove/{id}', [
    'uses' => 'ShoppingController@remove',
    'as' => 'cart.remove'
]);