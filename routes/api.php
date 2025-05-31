<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\SubscriptionController;
use App\Http\Controllers\api\CustomerSubscriptionController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/products', [ProductController::class, 'store']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);
Route::put('/products/{id}', [ProductController::class, 'update']);

Route::get('/subscriptions', [SubscriptionController::class, 'index']);
Route::get('/subscriptions/{id}', [SubscriptionController::class, 'show']);
Route::post('/subscriptions', [SubscriptionController::class, 'store']);
Route::put('/subscriptions/{id}', [SubscriptionController::class, 'update']);
Route::delete('/subscriptions/{id}', [SubscriptionController::class, 'destroy']);


Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/customer-subscriptions', [CustomerSubscriptionController::class, 'store']);
});
