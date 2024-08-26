<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestZoneController;
use App\Models\Product;
use App\Models\TestZone;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\test;

//home
Route::get('/',[HomeController::class, 'index']);


Route::get('/test', [TestZoneController::class, 'index'])->name('testZone.index');
Route::post('/test', [TestZoneController::class, 'store'])->name('testZone.store');
Route::get('/test/{id}/edit', [TestZoneController::class, 'edit'])->name('testZone.edit');
Route::put('/test/{id}', [TestZoneController::class, 'update'])->name('testZone.update');
Route::delete('/test/{id}', [TestZoneController::class, 'destroy'])->name('testZone.destroy');
Route::patch('/testZone/{id}/toggle', [TestZoneController::class, 'toggle'])->name('testZone.toggle');

//product
Route::get('/create', [test::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{slug}', [ProductController::class, 'show']);
Route::get('/products/kategories/{kategori:name_kategori}', [ProductController::class, 'showByKategori']);
Route::resource('products', ProductController::class);

