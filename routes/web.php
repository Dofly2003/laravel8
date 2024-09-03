<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\SliderController;
use App\Models\Product;
use App\Models\TestZone;
use App\Http\Controllers\test;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestZoneController;
use App\Http\Controllers\Auth\LoginController;

//home
Route::get('/',[HomeController::class, 'index']);
Route::get('/kontak',
    function () {
        return view('kontak');
    });
Route::get('/profil',
    function () {
        return view('profilPerusahaan');
    });


Route::get('/test', [TestZoneController::class, 'index'])->name('testZone.index');
Route::post('/test', [TestZoneController::class, 'store'])->name('testZone.store');
Route::get('/test/{id}/edit', [TestZoneController::class, 'edit'])->name('testZone.edit');
Route::put('/test/{id}', [TestZoneController::class, 'update'])->name('testZone.update');
Route::delete('/test/{id}', [TestZoneController::class, 'destroy'])->name('testZone.destroy');
Route::patch('/testZone/{id}/toggle', [TestZoneController::class, 'toggle'])->name('testZone.toggle');

Route::post('/{slider:id}', [TestZoneController::class, 'publishSliders'])->name('publish.slider');
Route::post('/{customer:id}', [TestZoneController::class, 'publishCustomer'])->name('publish.customer');
Route::post('/{brand:id}', [TestZoneController::class, 'publishBrand'])->name('publish.brand');

Auth::routes();
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::Post('/login/Auth', [LoginController::class, 'Login']);
Route::Post('/Register/Auth', [RegisterController::class, 'register']);
Route::post('/logout/Auth', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashbordController::class, 'index'])->middleware('auth')->name('dashboard');
// Route::get('/home', function () {
//     return redirect('/dashboard');
// })->name('home');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::resource('sliders', SliderController::class);


Route::prefix('admin')->name('Admin.')->middleware('auth')->group(function (){

    //slider main
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/sliders/create', [SliderController::class, 'showViewCreate'])->name('slider.create');
    Route::post('/slider/Create', [SliderController::class, 'store'])->name('sliders.store');
    Route::get('/sliders/{id}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
    Route::put('/sliders/{id}', [SliderController::class, 'update'])->name('sliders.update');
    Route::delete('/sliders/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');


    //product main
    Route::get('/product', [ProductController::class, 'showIndexAdmin'])->name('product.index');
    Route::get('/products/create', [ProductController::class, 'showViewCreate'])->name('product.create');
    Route::post('/product/Create', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');




});


//product
Route::get('/create', [test::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{slug}', [ProductController::class, 'show']);
Route::get('/products/kategories/{kategori:name}', [ProductController::class, 'showByKategori']);
Route::resource('products', ProductController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
