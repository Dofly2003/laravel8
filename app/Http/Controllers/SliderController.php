<?php
namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $slides = Slider::paginate(7);
        return view('admin.slide.index', compact('slides'));
    }
    public function showViewCreate()
    {
        $slides = Slider::all();
        return view('admin.slide.create', compact('slides'));
    }


    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'market_place' => 'nullable|string', 
            'is_publish' => 'nullable|boolean',
        ]);

        // Handle file upload
        $fileName = time() . '.' . $request->img->extension();
        $request->img->move(public_path('uploads'), $fileName);

        // Create a new Slider record
        Slider::create([
            'name' => $request->name,
            'img' => $fileName,
            'market_place' => $request->market_place,
            'is_publish' => $request->has('is_publish') ? 1 : 0,
        ]);

        // Redirect to the correct route after creation
        return redirect()->route('Admin.slider.index')->with('success', 'New Slider successfully Created.');
    }


    // Show View Edit
    public function edit($id)
    {
        $slides = Slider::find($id); // Use `find` instead of `findOrFail` to prevent automatic failure

        // Check if the slider exists
        if (!$slides) {
            return redirect()->route('Admin.slider.index')->with('error', 'Slider not found.');
        }

        return view('admin.slide.update', compact('slides'));
    }

    // function update data
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_publish' => 'nullable|boolean',
        ]);

        // Prepare data for update
        $data = [
            'name' => $request->name,
            // 'is_publish' => $request->has('is_publish') ? 1 : 0,
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

        return redirect()->route('Admin.slider.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        // Delete image file
        if ($slider->img) {
            $imagePath = public_path('uploads/' . $slider->img);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $slider->delete();

        return redirect()->route('Admin.slider.index')->with('success', 'Slider deleted successfully.');
    }
}