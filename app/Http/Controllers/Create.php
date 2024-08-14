<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Create extends Controller
{
    public function index(){
        return view('create',[
            'kategories' => Kategori::all()
        ]);
    }
    public function submit (Request $request){
        
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'kategori' => 'required|string|max:255',
        ]);

        DB::table('products')->insert([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'kategori' => $request->kategori,
        ]);
        return redirect()->back()->with('success', 'Product berhasil disimpan!');

    }
}
