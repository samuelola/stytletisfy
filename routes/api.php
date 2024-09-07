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
    //Route::get('user', [AuthController::class,'user'])->middleware('auth:api');
    Route::get('user', [AuthController::class,'user']);

 Route::group(['middleware','auth:api'],function(){
    Route::apiResource('products',ProductController::class)->only(['index','show']);
    Route::apiResource('categories',CategoryController::class)->only(['index']);
    Route::apiResource('subcategories',SubCategoryController::class)->only(['index']);
    //Route::apiResource('users',UserController::class)->middleware('auth:api');
    Route::apiResource('users',UserController::class);
    Route::apiResource('multiple_images',MultipleImagesController::class);
    Route::apiResource('cart',CartController::class);
    Route::get('count-cart/{cart_id}/{user_id}',[CountCartController::class,'cartdetails']);
    Route::apiResource('wishlist',WishlistController::class);

 });   
    
});


