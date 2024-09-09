<?php
// App/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
use App\Models\Product;


class DashbordController extends Controller
{
    public function index()
    {
        // Pastikan hanya admin yang bisa mengakses dashboard
        // if (!Auth::check() || !Auth::user()->isAdmin()) {
        //     return redirect('/'); // Redirect jika bukan admin
        // }


        $products = Product::paginate(5); // Ambil semua produk dari database
        $slides = Slider::paginate(5); // Ambil semua slide dari database
        return view('dashbord', compact('products', 'slides')); // Pastikan view ini sesuai
    }
}   