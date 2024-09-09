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
            $query->where('name', $kategori->name);
        })->with('kategori_product')->get();

        if ($kategori) {
            // Filter produk berdasarkan kategori yang dipilih
            $products = Product::whereHas('kategori_product', function ($query) use ($kategori) {
                $query->where('name', $kategori->name);
            })->with('kategori_product')->get();

            $selectedCategory = $kategori->name;
        } else {
            // Tampilkan semua produk jika tidak ada kategori yang dipilih
            $products = Product::with('kategori_product')->paginate(20)->get();

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
 
    public function update(Request $request, Product $product)
    {
        // Validate input from the form
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategoris,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Debugging: Log the request data
        Log::info('Update request data:', $request->all());

        // Handle image upload
        $imagePath = $product->img; // Default to old image path

        if ($request->hasFile('img')) {
            // Debugging: Log image file information
            Log::info('Image file uploaded:', [
                'original_name' => $request->file('img')->getClientOriginalName(),
                'mime_type' => $request->file('img')->getMimeType(),
                'size' => $request->file('img')->getSize(),
            ]);

            // Delete old image if exists
            if ($product->img) {
                Storage::disk('public')->delete($product->img);
            }

            // Store new image
            $imagePath = $request->file('img')->store('images', 'public');
        }

        // Update product data
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'img' => $imagePath,
        ]);

        // Sync categories with product
        $product->kategori_product()->sync($request->kategori);

        // Debugging: Log successful update
        log::info('Product updated successfully:', $product->toArray());

        // Redirect after successful update
        return redirect()->route('Admin.product.index')->with('success', 'Product updated successfully.');
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
