<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MultipleImagesController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CountCartController;
use App\Http\Controllers\Api\WishlistController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::group([

    'middleware' => 'api',
    // 'prefix' => 'auth'

], function ($router) {
    Route::post('signup', [AuthController::class,'signup']);
    Route::post('signin', [AuthController::class,'signin']);
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::get('user', [AuthController::class,'user'])->middleware('auth:api');
    Route::apiResource('products',ProductController::class);
    Route::apiResource('categories',CategoryController::class)->middleware('auth:api');
    Route::apiResource('subcategories',SubCategoryController::class)->middleware('auth:api');
    // Route::apiResource('categories',CategoryController::class);
    // Route::apiResource('subcategories',SubCategoryController::class);
    Route::apiResource('users',UserController::class)->middleware('auth:api');
    Route::apiResource('multiple_images',MultipleImagesController::class)->middleware('auth:api');
    Route::apiResource('cart',CartController::class);
    Route::get('count-cart/{cart_id}/{user_id}',[CountCartController::class,'cartdetails']);
    Route::apiResource('wishlist',WishlistController::class);
});

//  Route::apiResource('categories',CategoryController::class);
//     Route::apiResource('subcategories',SubCategoryController::class);
