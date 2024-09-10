<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::all();
        return view('Admin.brand.index', compact('brands'));
    }


    public function create()
    {
        return view('Admin.brand.create'); // Tampilkan form untuk membuat brand baru
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_publish' => 'nullable|boolean',


        ]);

        $fileName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('uploads'), $fileName);

        Brand::create([
            'name' => $request->name,
            'img' => $fileName,
            'is_publish' => $request->has('is_publish') ? 1 : 0,
        ]); // Simpan data brand baru

        return redirect()->route('Admin.brand.index')->with('success', 'Brand created successfully.');
    }


    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.show', compact('brand')); // Tampilkan detail brand
    }


    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('Admin.brand.update', compact('brand'));
    }


    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name' => $request->name,
        ];
        if ($request->hasFile('img')) {
            // Delete old image
            if ($brand  ->img) {
                $oldImagePath = public_path('uploads/' . $brand ->img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $fileName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $fileName);
            $data['img'] = $fileName;
        }
        $brand->update($data);
        return redirect()->route('Admin.brand.index')
            ->with('success', 'Brand updated successfully.');
    }


    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        if ($brand->img) {
            $imagePath = public_path('uploads/' . $brand->img);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $brand->delete();

        return redirect()->back()->with('success', 'Brand deleted successfully.');
    }

    public function publishBrand($id)
    {
        $photo = Brand::findOrFail($id);
        $photo->is_publish = !$photo->is_publish; // Toggle nilai
        $photo->save();

        return redirect()->back()->with('success', 'Status publikasi berhasil diubah.');
    }
}

