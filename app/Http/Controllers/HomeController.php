<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Slider;
use App\Models\TestZone;
use App\Models\videos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $videos = videos::where('is_publish', true)->orderBy('created_at', 'desc')->get();
        $sliders = Slider::all();
        $products = Product::all();
        $customers = Customer::all();
        $brands = Brand::all();
        $active = Slider::where('is_publish', 1)->get();
        $title = 'Home';
        return view('home', compact('sliders', 'products', 'customers', 'brands', 'active', 'videos','title'));

    }

    public function showVideos(){
        $videos = videos::all();
        return view('Admin.video.index', compact('videos'));
    }
    public function create(){
        $videos = videos::all();
        return view('Admin.video.create', compact('videos'));
    }


    public function extractYouTubeId($url)
    {
        // Cek jika URL adalah short URL (youtu.be)
        if (preg_match('/youtu\.be\/([^\?]*)/', $url, $matches)) {
            return $matches[1]; // Mengembalikan ID Video dari URL short
        }

        // Cek jika URL adalah format normal (youtube.com)
        if (preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches)) {
            return $matches[1]; // Mengembalikan ID Video dari URL normal
        }

        return null; // Jika tidak ditemukan, kembalikan null
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'youtube_url' => 'required|url', // Validasi input sebagai URL
        ]);

        // Ekstrak ID Video YouTube dari URL
        $videoId = $this->extractYouTubeId($request->youtube_url);

        if ($videoId) {
            // Simpan ID Video ke database
            videos::create([
                'title' => $request->title,
                'youtube_url' => $videoId, // Hanya simpan ID Video
            ]);

            return redirect()->route('Admin.video.showVideos')->with('success', 'Video berhasil disimpan!');
        } else {
            return redirect()->back()->with('error', 'URL YouTube tidak valid.');
        }
    }

    public function publishVideos($id)
    {
        $photo = videos::findOrFail($id);
        $photo->is_publish = !$photo->is_publish; 
        $photo->save();
        videos::where('id','!=',$id)->update([
            'is_publish' => 0
        ]);
        return redirect()->back()->with('success', 'Status publikasi berhasil diubah.');
    }


}
