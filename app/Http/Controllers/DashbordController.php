<?php
// App/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
use App\Models\Product;


class DashbordController extends Controller
{
    public function index()
    {

       $pesan = Pesan::latest()->get();
        return view('dashbord', compact('pesan', )); // Pastikan view ini sesuai
    }
}   