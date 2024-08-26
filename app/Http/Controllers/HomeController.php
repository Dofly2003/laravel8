<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TestZone;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders = TestZone::all();
        $products =  Product::all();
        return view('home', compact('sliders', 'products'));
    }
}
