<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\test;

Route::get('/', function () {
    return view('home',[
        'products' => Product::all(),
    ]);
});
Route::get('/test', [test::class, 'index']);


Route::resource('/products', ProductController::class)->names('product.submit');