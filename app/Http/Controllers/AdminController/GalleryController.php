<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::get();
        return view('admin.gallery.gallery-details', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.gallery.add-gallery');
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
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'status' => 'required', // Example: validating status to be either 'active' or 'inactive'
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        try {
            $image = $request->file('image');
            $img_extension = $image->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $pathimage = $image->move(public_path('assets/dynamics/gallery'), $name);
            // Assuming you have a model named YourModel
            $gallery = new Gallery;
            $gallery->image = $name;
            $gallery->title = $request->title;
            $gallery->status = $request->status;
            $gallery->save();
    
            return redirect()->route('galleries.index')->with('success', 'Gallery image created successfully');
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
        $gallery = Gallery::find($id);
        return view('admin.gallery.edit-gallery',compact('gallery'));
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
            'image' => 'image|mimes:jpeg,png,jpg|max:1024',
            'status' => 'required', // Example: validating status to be either 'active' or 'inactive'
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            // Check if updating an existing brand or creating a new one
            $gallery = Gallery::find($id);
    
            if ($request->hasFile('image')) {
                 // Upload the new image
                 $image = $request->file('image');
                 $img_extension = $image->getClientOriginalExtension();
                 $name = time() . '.' . $img_extension;
                 $image->move(public_path('assets/dynamics/slider'), $name);
                if ($gallery->image) {
                    $oldImagePath = public_path('assets/dynamics/slider/' . $gallery->image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
    
            $gallery->image = $name;
            }
            $gallery->title = $request->title;
            $gallery->status = $request->status;
            $gallery->save();
    
            // $message = $id ? 'Brand updated successfully' : 'Brand created successfully';
            return redirect()->route('galleries.index')->with('success', 'Gallery  edit successfullty');
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
        $gallery = Gallery::find($id);

        if ($gallery) {
            // Get the path of the images in the public folder
            $imagePath1 = public_path('assets/dynamics/gallery/' . $gallery->image);
        
            // Check if the files exist before attempting deletion
            if (file_exists($imagePath1)) {
                // Delete the first image
                unlink($imagePath1);
            }
        
            // Delete the record from the database
            $gallery->delete();
        
            return redirect()->back()->with('success', 'Gallery Images and associated record deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Image record not found.');
        }
        
    }
}
