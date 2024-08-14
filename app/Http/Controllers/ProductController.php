<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Product;

class ProductController extends Controller
{
    // Tampilkan daftar semua produk
    public function index()
    {
        // Menampilkan daftar kategori saat memuat halaman create
        return view('create', [
            'kategories' => Kategori::all(),
        ]);
    }

    // Tampilkan form untuk membuat produk baru
    public function create()
    {
        return view('products.create');
    }

    // Simpan produk baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'Nama' => 'required|string|max:255',
            'price' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|exists:kategoris,id', // Validasi ID kategori
        ]);

        // Simpan data ke database
        Product::create([
            'name' => $request->Nama,
            'slug' => $request->slug,
            'kategori_id' => $request->kategori, // Simpan ID kategori ke field kategori_id
            'description' => $request->deskripsi,
        ]);

        // Redirect setelah sukses menyimpan
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Tampilkan produk berdasarkan ID
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Tampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update produk di database
    public function update(Request $request, Product $product)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'kategori' => 'required|exists:kategoris,id',
            'image' => 'nullable|string',
        ]);

        // Update data produk
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            // 'image' => $request->image,
            'kategori_id' => $request->kategori,
            'description' => $request->description,
        ]);

        // Redirect setelah sukses update
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Hapus produk dari database
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
