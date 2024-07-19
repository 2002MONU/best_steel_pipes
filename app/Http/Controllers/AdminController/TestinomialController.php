<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Testinomial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TestinomialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testinomial::get();
        return view('admin.slider.testinomials-details',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.add-testimonial');
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
            'description' => 'required|string|max:700',
            'clientimage' => 'required|image|max:256|dimensions:min_width=50,min_height=50,max_width=500,max_height=500|mimes:jpeg,png,jpg',
            'clientname' => 'required|string|max:55',
            'designation' => 'required|string|max:55',
            'status' => 'required',
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        
            // Retrieve the brand record
            $testi = new Testinomial;
        
            // Handle the new client image upload
            $clientImage = $request->file('clientimage');
            $clientImgExtension = $clientImage->getClientOriginalExtension();
            $clientImgName = time() . '.' . $clientImgExtension;
            $pathClientImage = $clientImage->move(public_path('assets/dynamics/slider'), $clientImgName);
        
            // Update the brand record
          
            $testi->clientimage = $clientImgName;
            $testi->description = $request->description;
            $testi->clientname = $request->clientname;
            $testi->designation = $request->designation;
            $testi->status = $request->status;
            $testi->save();
        
            return redirect()->route('testinomials.index')->with('success', 'Testimonials Add successfully');
        
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
        $testi = Testinomial::find($id);
        return view('admin.slider.update-testimonial',compact('testi'));
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
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'description' => 'required|string|max:700',
            'clientimage' => 'image|nullable|max:256|dimensions:min_width=50,min_height=50,max_width=500,max_height=500|mimes:jpeg,png,jpg', // Only validate as image if it's present
            'clientname' => 'required|string|max:55',
            'designation' => 'required|string|max:55',
            'status' => 'required',
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    
        try {
            // Retrieve the testimonial record
            $testi = Testinomial::find($id);
    
            if ($request->hasFile('clientimage')) {
                // Handle the file upload
                $image = $request->file('clientimage');
                $img_extension = $image->getClientOriginalExtension();
                $name = time() . '.' . $img_extension;
                $pathimage = $image->move(public_path('assets/dynamics/slider'), $name);
    
                // Delete the old image if it exists
                $existingImagePath = public_path('assets/dynamics/slider/' . $testi->clientimage);
                if (file_exists($existingImagePath)) {
                    unlink($existingImagePath);
                }
    
                // Set the new image name
                $testi->clientimage = $name;
            }
    
            // Update the testimonial record
            $testi->description = $request->description;
            $testi->clientname = $request->clientname;
            $testi->designation = $request->designation;
            $testi->status = $request->status;
            $testi->save();
    
            return redirect()->route('testinomials.index')->with('success', 'Testimonial updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'There was an error updating the record. Please try again.']);
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
        // Find the testimonial by id
        $testi = Testinomial::find($id);
    
        if ($testi) {
            // Get the path of the image in the public folder
            $imagePath = public_path('assets/dynamics/slider/' . $testi->clientimage);
    
            // Check if the file exists before attempting deletion
            if (file_exists($imagePath)) {
                // Delete the image
                unlink($imagePath);
            }
    
            // Delete the record from the database
            $testi->delete();
    
            return redirect()->back()->with('success', 'Image and associated record deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Image record not found.');
        }
    }
    
}
