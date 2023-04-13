<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// User routes
Route::get('/', function () {
    return view('user.index');
});
Route::get('/product-detail', function () {
    return view('user.product-detail');
});
Route::get('/cart', function(){
    return view('user.cart');
});
Route::get('/profile', function(){
    return view('user.profile');
});
Route::get('/order', function(){
    return view('user.orderTracking');
});
Route::get('/shop', function(){
    return view('user.shop');
});
Route::get('/signup', function(){
    return view('user.signup');
});
Route::get('/login', function(){
    return view('user.login');
});


//bayern routes
// 0-3 father haland

// Admin routes
Route::get('/admin', function(){
    return view('admin.indexAdmin');
});
Route::get('/product-detail-admin', function () {
    return view('admin.product-details-admin');
});

Route::get('/order-detail-admin', function () {
    return view('admin.product-detail-admin');
});

Route::get('/user-detail-admin', function () {
    return view('admin.user-detail-admin');
});
Route::get('/test', function () {
    return view('admin.index');
});
