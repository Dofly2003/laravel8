<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});
Route::get('/test', function () {
    return view('testZone');
});

Route::resource('/products', ProductController::class)->names('product.submit');