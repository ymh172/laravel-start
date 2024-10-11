<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('/category',CategoryApiController::class);
Route::apiResource('/product',ProductApiController::class);
