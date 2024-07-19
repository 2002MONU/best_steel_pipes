<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Site_setting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seo_setting = Site_setting::find(1);
        return view('admin.site.site-settings',compact('seo_setting'));
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
        $seo_setting = Site_setting::find($id);
        return view('admin.site.edit-site-setting',compact('seo_setting'));
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
        $request->validate([
            'title' => 'required|string',
            'logo' => 'nullable|max:512|mimes:png,jpeg,jpg',
            'favicon' => 'nullable|max:512|mimes:png,jpeg,jpg',
            'about_banner' => 'nullable|max:512|mimes:png,jpeg,jpg',
            'category_banner' => 'nullable|max:512|mimes:png,jpeg,jpg',
            'gallery_banner' => 'nullable|max:512|mimes:png,jpeg,jpg',
            'contact_banner' => 'nullable|max:512|mimes:png,jpeg,jpg',
            'testimonial_image' => 'nullable|max:512|mimes:png,jpeg,jpg',
            'footerabout' => 'required|string|max:200',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'youtube_link' => 'nullable|url',
            'insta_link' => 'nullable|url',
            'linked_link' => 'nullable|url',
        ]);
    
        $details = Site_setting::findOrFail($id); // Use findOrFail to handle invalid IDs
    
        foreach (['about_banner', 'category_banner', 'gallery_banner', 'contact_banner', 'testimonial_image', 'logo','favicon'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $file = $request->file($imageField);
                $filename = time() .'.' . $file->getClientOriginalExtension();
                $file->move(public_path('website/dynamics/other'), $filename);
                $details->$imageField = $filename;
            }
        }
    
        $details->title = $request->title;   
        
        $details->footerabout = $request->footerabout;   
        $details->facebook_link = $request->facebook_link; 
        $details->twitter_link = $request->twitter_link; 
        $details->youtube_link = $request->youtube_link; 
        $details->insta_link = $request->insta_link; 
        $details->linked_link = $request->linked_link;
        
    
        $details->save();
   
        return redirect()->route('sitesettings.index')->with('success', 'Site setting updated successfully');
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
