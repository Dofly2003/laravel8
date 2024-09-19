<?php
// App/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\Pesan;
use App\Models\Slider;
use App\Models\User;
use App\Models\videos;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
use App\Models\Product;


class DashbordController extends Controller
{
    public function index()
    {
        $publishedSlides = Slider::where('is_publish', 1)->count();
        $unpublishedSlides = Slider::where('is_publish', 0)->count();

        $publishedProducts = Product::where('is_publish', 1)->count();
        $unpublishedProducts = Product::where('is_publish', 0)->count();

        $publishedBrands = Brand::where('is_publish', 1)->count();
        $unpublishedBrands = Brand::where('is_publish', 0)->count();

        $publishedKerjasama = Customer::where('is_publish', 1)->count();
        $unpublishedKerjasama = Customer::where('is_publish', 0)->count();

        $publishedVideos = videos::where('is_publish', 1)->count();
        $unpublishedVideos = videos::where('is_publish', 0)->count();

        $userAdmin = User::all()->count();
        $pesan = Pesan::latest()->get();
        return view('dashbord', compact(
            'pesan',
            'publishedSlides',
            'unpublishedSlides',  
            'publishedProducts',
            'unpublishedProducts',  
            'publishedBrands',
            'unpublishedBrands',  
            'publishedVideos',
            'unpublishedVideos',
            'publishedKerjasama',
            'unpublishedKerjasama',
            'userAdmin'
        )); 
    }
}