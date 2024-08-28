<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Slider;
use App\Models\TestZone;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        $products =  Product::all();
        $customers = Customer::all();
        $brands = Brand::all();
        $active = Slider::where('is_publish', 1)->get();
        return view('home', compact('sliders', 'products', 'customers', 'brands','active'));
    }
}
