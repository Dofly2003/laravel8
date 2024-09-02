<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\Slider;
use App\Models\TestZone;
use Illuminate\Http\Request;

class TestZoneController extends Controller
{

    public function index()
    {
        $photos = Slider::where('is_publish', 1)->get(); //masih nyangkut di slider tabel
        $sliders = TestZone::all(); // Fetch all sliders
        return view('testZone', compact('sliders', 'photos'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name_img' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_publish' => 'nullable|boolean',
        ]);

        // Handle file upload
        $fileName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('uploads'), $fileName);

        // Create a new slider record
        TestZone::create([
            'name_img' => $request->name_img,
            'img' => $fileName,
            'is_publish' => $request->has('is_publish') ? 1 : 0,
        ]);

        return redirect()->route('testZone.index')->with('success', 'Slider created successfully.');
    }

    public function edit($id)
    {
        $slider = TestZone::findOrFail($id);
        return view('testEdit', compact('slider')); // Assuming you have an editSlider view
    }

    public function update(Request $request, $id)
    {
        $slider = TestZone::findOrFail($id);

        // Validate the request
        $request->validate([
            'name_img' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_publish' => 'nullable|boolean',
        ]);

        // Prepare data for update
        $data = [
            'name_img' => $request->name_img,
            'is_publish' => $request->has('is_publish') ? 1 : 0,
        ];

        // Handle file upload if a new image is provided
        if ($request->hasFile('img')) {
            // Delete old image
            if ($slider->img) {
                $oldImagePath = public_path('uploads/' . $slider->img);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $fileName = time() . '.' . $request->img->extension();
            $request->img->move(public_path('uploads'), $fileName);
            $data['img'] = $fileName;
        }

        $slider->update($data);

        return redirect()->route('testZone.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy($id)
    {
        $slider = TestZone::findOrFail($id);

        // Delete image file
        if ($slider->img) {
            $imagePath = public_path('uploads/' . $slider->img);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $slider->delete();

        return redirect()->route('testZone.index')->with('success', 'Slider deleted successfully.');
    }
    public function toggle(Request $request, $id)
    {
        $slider = TestZone::findOrFail($id);
        $slider->is_publish = $request->has('is_publish') ? 1 : 0;
        $slider->save();

        return redirect()->route('testZone.index')->with('success', 'Slider visibility updated successfully.');
    }

    public function publishSliders($id)
    {
        $photo = Slider::findOrFail($id);
        $photo->is_publish = !$photo->is_publish; // Toggle nilai
        $photo->save();
        return redirect()->back()->with('success', 'Status publikasi berhasil diubah.');
    }
    // public function publishCustomer($id)
    // {
    //     $photo = Customer::findOrFail($id);
    //     $photo->is_publish = !$photo->is_publish; // Toggle nilai
    //     $photo->save();

    //     return redirect()->back()->with('success', 'Status publikasi berhasil diubah.');
    // }
    // public function publishBrand($id)
    // {
    //     $photo = Brand::findOrFail($id);
    //     $photo->is_publish = !$photo->is_publish; // Toggle nilai
    //     $photo->save();

    //     return redirect()->back()->with('success', 'Status publikasi berhasil diubah.');
    // }
    


}
