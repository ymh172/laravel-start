<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/item', function () {
//     return view('product.create');
// });

// Route::resource('/product', ProductController::class);
// Route::resource('/category', CategoryController::class);
// Route::resource('/person', PersonController::class);
// Route::resource('/phone', PhoneController::class);
// Route::get('/search', [ProductController::class, 'search'])->name('product.search');
// Route::resource('/team', TeamController::class);
// Route::resource('/player', PlayerController::class);

// Route::resource('/post', PostController::class);
// Route::resource('/employee', EmployeeController::class);
// Route::resource('/country', CountryController::class);
