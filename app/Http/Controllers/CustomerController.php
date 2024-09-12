<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('Admin.customer.index', compact('customers'));
    }


    public function create()
    {
        return view('Admin.customer.create'); // Tampilkan form untuk membuat brand baru
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

        Customer::create([
            'name' => $request->name,
            'img' => $fileName,
            'is_publish' => $request->has('is_publish') ? 1 : 0,
        ]); // Simpan data brand baru

        return redirect()->route('Admin.customer.index')->with('success', 'Brand created successfully.');
    }


    public function show($id)
    {
        $brand = Customer::findOrFail($id);
        return view('customers.show', compact('brand')); // Tampilkan detail brand
    }


    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('Admin.customer.update', compact('customer'));
    }


    public function update(Request $request, $id)
    {
        $brand = Customer::findOrFail($id);
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
        return redirect()->route('Admin.customer.index')
            ->with('success', 'Brand updated successfully.');
    }


    public function destroy($id)
    {
        $brand = Customer::findOrFail($id);
        if ($brand->img) {
            $imagePath = public_path('uploads/' . $brand->img);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $brand->delete();

        return redirect()->back()->with('success', 'Brand deleted successfully.');
    }

    public function publishCustomer($id)
    {
        $photo = Customer::findOrFail($id);
        $photo->is_publish = !$photo->is_publish; // Toggle nilai
        $photo->save();

        return redirect()->back()->with('success', 'Status publikasi berhasil diubah.');
    }
}
