<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class AboutPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = AboutPage::find(1);
        return view('admin.slider.about-details',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $about = AboutPage::find($id);
        return view('admin.slider.edit-about',compact('about'));
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
            'maintitle' => 'required|string|max:100',
            'description' => 'required|string',
            'our_vision' => 'required|string',
            'our_mission' => 'required|string',
            'titleicon1' => 'nullable|image|max:256|mimes:jpeg,png,jpg|dimensions:min_width=30,min_height=30,max_width=100,max_height=100',
            'title1' => 'required|string|max:100',
            'titleicon2' => 'nullable|image|max:256|mimes:jpeg,png,jpg|dimensions:min_width=30,min_height=30,max_width=100,max_height=100',
            'title2' => 'required|string|max:100',
            'aboutimage' => 'nullable|image|mimes:jpeg,png,jpg|max:1024|dimensions:min_width=400,min_height=500,max_width=800,max_height=1200'
        ]);
        
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        try {
            $about = AboutPage::find($id);
        
            if (!$about) {
                return redirect()->back()->with(['error' => 'About Page not found.']);
            }
        
            if ($request->hasFile('titleicon1')) {
                $image = $request->file('titleicon1');
                $img_extension = $image->getClientOriginalExtension();
                $name = time() . '_' . uniqid() . '.' . $img_extension;
                $pathimage = $image->move(public_path('assets/dynamics/slider'), $name);
                $about->titleicon1 = $name;
            }
        
            if ($request->hasFile('titleicon2')) {
                $image1 = $request->file('titleicon2'); // Corrected to 'titleicon2'
                $img_extension1 = $image1->getClientOriginalExtension();
                $name1 = time() . '_' . uniqid() . '.' . $img_extension1;
                $pathimage1 = $image1->move(public_path('assets/dynamics/slider'), $name1);
                $about->titleicon2 = $name1;
            }
        
            if ($request->hasFile('aboutimage')) {
                $image2 = $request->file('aboutimage');
                $img_extension2 = $image2->getClientOriginalExtension();
                $name2 = time() . '_' . uniqid() . '.' . $img_extension2;
                $pathimage2 = $image2->move(public_path('assets/dynamics/slider'), $name2);
                $about->aboutimage = $name2;
            }
        
            $about->maintitle = $request->maintitle;
            $about->description = $request->description;
            $about->title1 = $request->title1;
            $about->title2 = $request->title2;
             $about->our_vision = $request->our_vision;
              $about->our_mission = $request->our_mission;
            $about->save();
        
            return redirect()->route('aboutpages.index')->with('success', 'About Details Edit successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => 'There was an error editing About Details. Please try again.']);
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
        //
    }
}
