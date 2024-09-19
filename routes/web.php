<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SliderController;
use App\Models\Product;
use App\Http\Controllers\test;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;

//home
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/customers', [CustomerController::class, 'showIndex']);
Route::get('/kontak', function () {
    return view('kontak', ['title' => 'Kontak']); });
Route::get('/profil', [ProfilController::class, 'index']);
Route::post('/kontak/massage', [PesanController::class, 'store'])->name('kontak.massage');

// auth 

Auth::routes();
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login/Auth', [LoginController::class, 'login'])->name('login.post'); 
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/Register/Auth', [RegisterController::class, 'register'])->name('register.post'); // Menangani form registrasi
Route::post('/logout/Auth', [LoginController::class, 'logout'])->name('logout'); // Logout
Route::get('/dashboard', [DashbordController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/create', [test::class, 'index']);

//product
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{slug}', [ProductController::class, 'SinglePoRoduct']);
Route::get('/products/kategories/{kategori:name}', [ProductController::class, 'showByKategori']);
Route::resource('products', ProductController::class);

Route::prefix('admin')->name('Admin.')->middleware('auth')->group(function () {

    //slider main
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/sliders/create', [SliderController::class, 'showViewCreate'])->name('slider.create');
    Route::post('/slider/Create', [SliderController::class, 'store'])->name('sliders.store');
    Route::get('/sliders/{id}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
    Route::put('/sliders/{id}', [SliderController::class, 'update'])->name('sliders.update');
    Route::delete('/sliders/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');


    //product main
    Route::get('/products', [ProductController::class, 'showIndexAdmin'])->name('product.index');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/Create', [ProductController::class, 'store'])->name('product.store');
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

    //kategori main 
    Route::get('/kategori', [kategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategories/create', [kategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategories/store', [kategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategories/{id}/edit', [kategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategories/{id}', [kategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategories/{id}', [kategoriController::class, 'destroy'])->name('kategori.destroy');


    //videos 
    Route::get('/videos', [HomeController::class, 'showVideos'])->name('video.showVideos');
    Route::get('/video', [HomeController::class, 'create'])->name('video.create');
    Route::post('/videos/store', [HomeController::class, 'store'])->name('video.store');
    Route::get('/videos/{id}/edit', [HomeController::class, 'edit'])->name('video.edit');
    Route::put('/videos/{id}', [HomeController::class, 'update'])->name('video.update');
    Route::delete('/videos/{id}', [HomeController::class, 'destroy'])->name('video.destroy');

    //brand
    Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/brands/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brands/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brands/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
    Route::put('/brands/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');

    //customers
    Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('customers/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('customers/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('customers/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('customers/{id}', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('customers/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

    //Profil

    Route::get('profil', [ProfilController::class, 'showIndex'])->name('profil.index');
    Route::get('profil/show/{id}', [ProfilController::class, 'show'])->name('profil.show');
    Route::get('profil/create', [ProfilController::class, 'create'])->name('profil.create');
    Route::post('profil/store', [ProfilController::class, 'store'])->name('profil.store');
    Route::get('profil/{id}/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::put('profil/{id}', [ProfilController::class, 'update'])->name('profil.update');
    Route::delete('profil/{id}', [ProfilController::class, 'destroy'])->name('profil.destroy');


    //massage

    Route::get('massages', [PesanController::class, 'Index'])->name('massages.index');
    Route::get('/massages/{id}', [PesanController::class, 'show'])->name('massages.show');

    

});

//publish or not
Route::post('/slider/{slider:id}', [SliderController::class, 'publishSliders'])->name('publish.slider');
Route::post('/product/{Product:id}', [ProductController::class, 'publishProduct'])->name('publish.product');
Route::post('/brand/{brand:id}', [BrandController::class, 'publishBrand'])->name('publish.brand');
Route::post('/videos/{videos:id}', [HomeController::class, 'publishVideos'])->name('publish.videos');
Route::post('/customer/{customer:id}', [CustomerController::class, 'publishCustomer'])->name('publish.customer');
Route::post('/profil/{profil:id}', [ProfilController::class, 'publishProfil'])->name('publish.profil');
Route::post('/kategori/{kategori:id}', [kategoriController::class, 'publishKategori'])->name('publish.Kategori');


