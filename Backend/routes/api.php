<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('categories', [CategoryController::class, 'index']);
// Route::get('categories/{category}', [CategoryController::class, 'show']);
// Route::post('categories', [CategoryController::class, 'store']);
// Route::put('categories/{category}', [CategoryController::class, 'update']);
// Route::delete('categories/{category}', [CategoryController::class, 'destroy']);

// or use apiResource
// Route::middleware('auth:sanctum')->group(function () {

Route::apiResource('categories', CategoryController::class)->middleware('throttle:3,1');
// })
// product
Route::get('products', [ProductController::class, 'index'])->middleware('throttle:products');
