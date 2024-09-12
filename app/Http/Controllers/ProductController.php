<?php

namespace App\Http\Controllers;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Kategori;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // Tampilkan daftar semua produk
    public function index(Request $request)
    {
        $selectedCategory = 'All Product';
        $sliders = Slider::all();

        // Ensure the query builder is paginated
        $products = Product::filter(request(['search', 'kategori']))
            ->with('kategori_product')
            ->latest()
            ->paginate(20)
            ->withQueryString();

        // dd(get_class($products));
        $kategoris = Kategori::all();
        return view('products', compact('products', 'kategoris', 'selectedCategory', 'sliders'));
    }
    // Tampilkan detail produk
    public function showIndexAdmin(Product $product)
    {
        $products = Product::filter(request(['search', 'kategori']))
            ->with('kategori_product')
            ->latest()
            ->paginate(7)
            ->withQueryString();

        return view('admin.product.index', compact('products'));
    }



    // Tampilkan form untuk membuat produk baru
    public function create()
    {
        $kategoris = Kategori::all();
        return view('Admin.product.create', compact('kategoris'));
    }

    // Simpan produk baru ke database



    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategoris,id',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Handle file upload
            $fileName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $fileName);


            // Generate unique slug
            $slug = Str::slug($request->name);
            $originalSlug = $slug;
            $count = 1;

            // Check for slug uniqueness and modify if necessary
            while (Product::where('slug', $slug)->exists()) {
                $slug = "{$originalSlug}_{$count}";
                $count++;
            }

            // Save product data to the database
            $product = Product::create([
                'name' => $request->name,
                'slug' => $slug, // Save the unique slug
                'description' => $request->deskripsi,
                'price' => $request->price,
                'img' => $fileName, // Save image file name
            ]);

            // Link categories to the product using the pivot table
            $product->kategori_product()->sync($request->kategori);

            // Redirect after successful save
            return redirect()->route('Admin.product.index')->with('success', 'Product created successfully.');
        } catch (\Exception $e) {
            // Handle errors and provide an error message
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage())->withInput();
        }
    }


    // Tampilkan produk berdasarkan ID
    public function SinglePoRoduct(Product $product, $slug)
    {
        $product->load('kategori_product');
        $product = Product::where('slug', $slug)->with('kategori_product')->firstOrFail();
        return view('product', compact('product'), [
            'product' => $product,
            'products' => Product::all(),
        ]);
    }

    public function show($id, Product $product)
    {
        $product->load('kategori_product');
        $product = Product::find($id);

        if (!$product) {
            // Handle the case when the product is not found
            abort(404, 'Product not found');
        }

        return view('Admin.product.show', compact('product'));
    }
    public function showByKategori(Kategori $kategori = null)
    {
        $products = Product::whereHas('kategori_product', function ($query) use ($kategori) {
            $query->where('name', $kategori->name);
        })->with('kategori_product')->get();

        if ($kategori) {
            $products = Product::whereHas('kategori_product', function ($query) use ($kategori) {
                $query->where('name', $kategori->name);
            })->with('kategori_product')->get();

            $selectedCategory = $kategori->name;
        } else {
            $products = Product::with('kategori_product')->paginate(20);

            $selectedCategory = 'All';
        }

        $allKategoris = Kategori::all();

        return view('products', [
            'products' => $products,
            'selectedCategory' => $selectedCategory,
            'kategoris' => $allKategoris,
        ]);
    }


    public function edit($id)
    {
        $kategoris = Kategori::all();
        $product = Product::with('kategori_product')->find($id);
        if (!$product) {
            return redirect()->route('Admin.product.index')->with('error', 'Slider not found.');
        }
        return view('admin.product.update', compact('product', 'kategoris'));
    }

    // Update produk di database

    public function update(Request $request, $id, Product $product)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'nullable|string',
            'kategori' => 'nullable|array', // Pastikan input kategori diharapkan sebagai array
            'kategori.*' => 'exists:kategoris,id', // Memastikan kategori yang dipilih ada di tabel kategoris
        ]);


        // Temukan produk berdasarkan ID
        $product = Product::findOrFail($id);

        // Cek jika ada gambar baru yang diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->img) {
                Storage::delete($product->img); // Asumsikan gambar disimpan di storage
            }

            // Simpan gambar baru dan ambil path-nya
            $imagePath = $request->file('image')->store('product_images', 'public');
        } else {
            // Jika tidak ada gambar baru, tetap gunakan gambar lama
            $imagePath = $product->img;
        }
        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;

        // Pastikan slug unik
        while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
            $slug = "{$originalSlug}-{$count}";
            $count++;
        }

        // Update data produk
        $product->update([
            'name' => $validatedData['name'],
            'slug' => $slug,
            'image' => $imagePath,
            'description' => $validatedData['description'] ?? $product->description,
        ]);

        // Sinkronisasi kategori produk dengan kategori yang dipilih
        if ($request->has('kategori')) {
            $product->kategori_product()->sync($validatedData['kategori']);
        } else {
            // Jika tidak ada kategori yang dipilih, kosongkan relasi
            $product->kategori_product()->detach();
        }

        // Redirect atau kembalikan respons sesuai kebutuhan
        return redirect()->route('Admin.product.index')->with('success', 'Produk berhasil diupdate.');
    }



    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id); // Temukan produk atau gagal

            // Hapus relasi antara produk dan kategori
            $product->kategori_product()->detach();

            // Hapus produk itu sendiri
            $product->delete();

            return redirect()->back()->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the product.');
        }
    }


    public function publishProduct($id)
    {
        $photo = Product::findOrFail($id);
        $photo->is_publish = !$photo->is_publish; // Toggle nilai
        $photo->save();
        return redirect()->back()->with('success', 'Status publikasi berhasil diubah.');
    }

}
