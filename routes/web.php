<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'doLogin']);

Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::view('/admin/{any}', 'singleApp')->where('any', '.*')->middleware('auth');

Route::prefix('api')->middleware('auth')->group(function () {
    Route::post('/upload', [\App\Http\Controllers\UploadController::class, 'upload']);
    Route::post('/required_data', [\App\Http\Controllers\SupportController::class, 'requiredData']);
    Route::get('/configurations', [\App\Http\Controllers\SupportController::class, 'getConfigurations']);

    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('sub_categories', \App\Http\Controllers\SubCategoryController::class);
    Route::resource('customer', \App\Http\Controllers\CustomerController::class);
    Route::resource('product', \App\Http\Controllers\ProductController::class);
});
