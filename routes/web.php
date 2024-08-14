<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home',[
        'products' => Product::all(),
    ]);
});
Route::get('/test', function () {
    return view('testZone');
});

Route::resource('/products', ProductController::class)->names('product.submit');