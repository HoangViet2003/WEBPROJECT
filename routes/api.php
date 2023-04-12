<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthenticationController;
use App\Http\Controllers\Api\V1\CartController;
use App\Http\Controllers\Api\V1\CartItemController;
use App\Http\Controllers\Api\V1\OrderController;
use App\Http\Controllers\Api\V1\OrderItemController;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/register', [AuthenticationController::class, 'register']);
Route::resource('products', ProductController::class);
Route::resource('carts', CartController::class);
Route::resource('orders', OrderController::class);
Route::resource('cartItem', CartItemController::class);
Route::resource('orderItem', OrderItemController::class);
Route::get('productSearch', [ProductController::class, 'searchProduct']);
Route::get('/users/searchByEmail', [UserController::class, 'getUserByEmail']);
Route::post('storeImage', [ProductController::class, 'storeImage']);


// user routes
Route::group([
    'middleware' => ['jwt.verify', 'admin'],
], function () {
    Route::resource('/users', UserController::class);
    Route::post('products', [ProductController::class, 'store'])->middleware('upload.multiple.images');
    Route::put('/products/:id', [ProductController::class, 'update']);
    Route::delete('/products/:id', [ProductController::class, 'destroy']);
});
