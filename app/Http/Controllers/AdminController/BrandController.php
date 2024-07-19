<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.slider.brands-details' ,compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.slider.add-brands');
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
            'image' => 'required|image',
            'status' => 'required', // Example: validating status to be either 'active' or 'inactive'
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        try {
            $image = $request->file('image');
            $img_extension = $image->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $image->move(public_path('assets/dynamics/slider'), $name);
            // Assuming you have a model named YourModel
            $brands = new Brand;
            $brands->image = $name;
            $brands->title = $request->title;
            $brands->status = $request->status;
            $brands->save();
    
            return redirect()->route('brands.index')->with('success', 'Brands created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'There was an error creating the record. Please try again.']);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.slider.edit-brands',compact('brand'));
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
            'image' => 'nullable|image', // Allow image to be nullable for updates
            'status' => 'required', // Validate status to be either 'active' or 'inactive'
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        try {
            // Check if updating an existing brand or creating a new one
            $brand = Brand::find($id);
    
            if ($request->hasFile('image')) {
                 // Upload the new image
                 $image = $request->file('image');
                 $img_extension = $image->getClientOriginalExtension();
                 $name = time() . '.' . $img_extension;
                 $image->move(public_path('assets/dynamics/slider'), $name);
                if ($brand->image) {
                    $oldImagePath = public_path('assets/dynamics/slider/' . $brand->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
    
            $brand->image = $name;
            }
    
            $brand->title = $request->title;
            $brand->status = $request->status;
            $brand->save();
    
            // $message = $id ? 'Brand updated successfully' : 'Brand created successfully';
            return redirect()->route('brands.index')->with('success', 'Brand edit successfullty');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'There was an error processing the request. Please try again.']);
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
        $brand = Brand::find($id);

        if ($brand) {
            // Get the path of the images in the public folder
            $imagePath1 = public_path('assets/dynamics/slider/' . $brand->image);
        
            // Check if the files exist before attempting deletion
            if (file_exists($imagePath1)) {
                // Delete the first image
                unlink($imagePath1);
            }
        
            // Delete the record from the database
            $brand->delete();
        
            return redirect()->back()->with('success', 'Brand Images and associated record deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Image record not found.');
        }
        
    }
}
