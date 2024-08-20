<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Kategori;
use App\Models\Product;

class ProductController extends Controller
{
    // Tampilkan daftar semua produk
    public function index(Request $request)
    {
        // Ambil produk dengan relasi kategori_product
        // $product = Product::with('kategori_product')->get();

        $selectedCategory = 'All Product';

        $product = Product::with('kategori_product')->filter(request(['search','kategori']))->get();

        $kategoris = Kategori::all();
        return view('products', compact('product', 'kategoris', 'selectedCategory'), [
            'products' => $product,
            // 'search' => $search,
            'kategoris' => $kategoris
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
            'slug' => 'required|string|max:255',
            'price' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategoris,id',
        ]);

        // Log data input
        Log::info('Request Data:', $request->all());

        // Simpan data produk ke database
        $product = Product::create([
            'name_product' => $request->Nama,
            'slug' => $request->slug,
            'description' => $request->deskripsi,
        ]);

        // Log produk yang baru dibuat
        Log::info('Product Created:', $product->toArray());

        // Hubungkan kategori ke produk
        $hasil = $product->kategoris()->sync($request->kategori);

        // Log hasil sync
        Log::info('Sync Result:', $hasil);

        // Redirect setelah sukses menyimpan
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }




    // Tampilkan produk berdasarkan ID
    public function show(Product $product, $slug)
    {
        // Load product with kategori_product relationship
        $product->load('kategori_product');

        // // Get filters from request
        // $filters = $request->only('kategori');

        // // Query untuk produk dengan filter kategori
        // $products = Product::with('kategori_product')
        //     ->when(isset($filters['kategori']) && $filters['kategori'], function ($query) use ($filters) {
        //         $query->whereHas('kategori_product', function ($query) use ($filters) {
        //             $query->where('slug', $filters['kategori']);
        //         });
        //     })
        //     ->get();

        $product = Product::where('slug', $slug)->with('kategori_product')->firstOrFail();
        // dd($product);
        return view('product', compact('product'), [
            'product' => $product,
            'products' => Product::all(),
        ]);
    }
    public function showByKategori(Kategori $kategori = null)
{
    $products = Product::whereHas('kategori_product', function ($query) use ($kategori) {
        $query->where('name_kategori', $kategori->name_kategori);
    })->with('kategori_product')->get();

    if ($kategori) {
        // Filter produk berdasarkan kategori yang dipilih
        $products = Product::whereHas('kategori_product', function ($query) use ($kategori) {
            $query->where('name_kategori', $kategori->name_kategori);
        })->with('kategori_product')->get();

        $selectedCategory = $kategori->name_kategori;
    } else {
        // Tampilkan semua produk jika tidak ada kategori yang dipilih
        $products = Product::with('kategori_product')->get();

        $selectedCategory = 'All';
    }

    $allKategoris = Kategori::all(); // Mengambil semua kategori

    // Mengembalikan view dengan produk yang telah difilter dan semua kategori
    return view('products', [
        'products' => $products,
        'selectedCategory' => $selectedCategory,
        'kategoris' => $allKategoris, // Mengirimkan semua kategori ke view
    ]);
}


    // public function showBySlug($slug, Request $request)
    // {
    //         // Cari produk berdasarkan slug
    // $product = Product::where('slug', $slug)->with('kategori_product')->firstOrFail();

    //     // Return ke view dengan produk yang ditemukan
    //     return view('products', [
    //         'product' => $product,
    //     ]);
    // }


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
