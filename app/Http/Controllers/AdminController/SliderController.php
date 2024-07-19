<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Slider;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::get();
      return view('admin.slider.slider-details',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.add-slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:400',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024|dimensions:min_width=1100,min_height=700,max_width=2500,max_height=1200',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            // Handle the file upload
            $image = $request->file('image');
            $img_extension = $image->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $image->move(public_path('assets/dynamics/slider'), $name);
    
            // Save the data to the database
            $slider = new Slider;
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->image = $name;
            $slider->status = $request->status;
            $slider->save(); // Ensure you call the save method correctly
    
            return redirect()->route('sliders.index')->with('success', 'Slider Details uploaded successfully');
        } catch (\Exception $e) {
            // Handle the exception and show an error message
            return redirect()->back()->with(['error' => 'There was an error uploading the Slider Details. Please try again.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit-slider',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:400',
            'image' => 'image|mimes:jpeg,png,jpg|max:1024|dimensions:min_width=1100,min_height=700,max_width=2500,max_height=1200',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        try {
            // Check if updating an existing HomeBanner or creating a new one
            $slider = Slider::find($id);
    
            if ($request->hasFile('image')) {
                // Handle the file upload
                $image = $request->file('image');
                $img_extension = $image->getClientOriginalExtension();
                $name = time() . '.' . $img_extension;
                $pathimage = $image->move(public_path('assets/dynamics/slider'), $name);
    
                // If updating an existing HomeBanner and there's an existing image, delete it
                
                    $existingImagePath = public_path('assets/dynamics/slider/' . $slider->image);
                    if (file_exists($existingImagePath)) {
                        unlink($existingImagePath);
                    }
               // Set the new image name
                $slider->image = $name;
            }
    
            // Save the data to the database
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->status = $request->status;
            $slider->save(); // Ensure you call the save method correctly
    
            return redirect()->route('sliders.index')->with('success', 'Slider Details Edit  successfully');
        } catch (\Exception $e) {
            // Handle the exception and show an error message
            return redirect()->back()->with(['error' => 'There was an error Slider Details Edit. Please try again.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        if ($slider) {
            // Get the path of the images in the public folder
            $imagePath1 = public_path('assets/dynamics/slider/' . $slider->image);
        
            // Check if the files exist before attempting deletion
            if (file_exists($imagePath1)) {
                // Delete the first image
                unlink($imagePath1);
            }
        
            // Delete the record from the database
            $slider->delete();
        
            return redirect()->back()->with('success', 'Images and associated record deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Image record not found.');
        }
        
    }
}
