<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SeoSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seo_setting = SeoSetting::get();
        return view('admin.site.seo-details' ,compact('seo_setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.site.add-seo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  Validator::make($request->all(),[
            'page_name' =>'required',
            'title' =>'required|string',
            'description' =>'required|string',
            'keywords' =>'nullable|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $our_team = new SeoSetting();
        // client image update
       

        $our_team->page_name = $request->page_name;
        $our_team->description = $request->description;
        $our_team->title = $request->title;
        $our_team->keywords = $request->keywords;
        $our_team->save();
        return redirect()->route('seosettings.index')->with('success','SEO add  successfully');
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
        $seo_setting = SeoSetting::find($id);
        return view('admin.site.edit-seo',compact('seo_setting'));
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
        $validator =  Validator::make($request->all(),[
            'page_name' =>'required',
            'title' =>'required|string',
            'description' =>'required|string',
            'keywords' =>'nullable|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $our_team =  SeoSetting::find($id);
        // client image update
       

        $our_team->page_name = $request->page_name;
        $our_team->description = $request->description;
        $our_team->title = $request->title;
        $our_team->keywords = $request->keywords;
        $our_team->save();
        return redirect()->route('seosettings.index')->with('success','SEO edit  successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seo_setting = SeoSetting::find($id)->delete();
        return redirect()->back()->with('success','SEO delete successfully');
    }
}
