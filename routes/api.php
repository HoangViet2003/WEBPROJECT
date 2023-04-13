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


Route::post('login', [AuthenticationController::class, 'login']);
Route::post('register', [AuthenticationController::class, 'register']);
Route::resource('products', ProductController::class);
Route::get('getAllProducts',[ ProductController::class,'getAllProductsWithoutLimit']);
Route::get('productSearch', [ProductController::class, 'searchProduct']);


// Route for authorized user
Route::group([
    'middleware' => ['jwt.verify', 'auth.resource']
], function () {
    Route::get('users/{id}', [UserController::class, 'show']);
    Route::put('users/{id}', [UserController::class, 'update']);

    Route::resource('carts', CartController::class);
    Route::resource('cartItem', CartItemController::class);

    Route::resource('orders', OrderController::class);
    Route::resource('orderItem', OrderItemController::class);
});


// Route for admin
Route::group([
    'middleware' => ['jwt.verify', 'admin'],
], function () {
    Route::get('users', [UserController::class, 'index']);
    Route::post('users', [UserController::class, 'store']);
    Route::delete('users/{id}', [UserController::class, 'destroy']);

    Route::post('products', [ProductController::class, 'store'])->middleware('upload.multiple.images');
    Route::put('products/{id}', [ProductController::class, 'update'])->middleware('upload.multiple.images');
    Route::delete('products/{id}', [ProductController::class, 'destroy']);

    Route::get("carts", [CartController::class, 'index']);
});
