<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\test;

Route::get('/', function () {
    return view('home',[
        'products' => Product::all(),
        // dd($request->all())
    ]);
});
Route::get('/test', function () {
    return view('testZone',[
        'products' => Product::all(),
        
    ]);
});
Route::get('/create', [test::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{slug}', [ProductController::class, 'show']);
Route::get('/products/kategories/{kategori:name_kategori}', [ProductController::class, 'showByKategori']);
Route::resource('products', ProductController::class);

