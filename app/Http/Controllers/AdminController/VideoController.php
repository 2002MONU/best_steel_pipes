<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::get();
        return view('admin.gallery.video-details',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.add-video');
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
           'video' => 'required|url',
            'status' => 'required', // Example: validating status to be either 'active' or 'inactive'
        ]);
    
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
            $video = new Video();
            $video->video = $request->video;
            $video->status = $request->status;
            $video->save();
    
            return redirect()->route('videos.index')->with('success', 'Video Link created successfully');
       
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
        $video = Video::find($id);
        return view('admin.gallery.edit-video',compact('video'));
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
            'video' => 'required|url',
             'status' => 'required', // Example: validating status to be either 'active' or 'inactive'
         ]);
     
         if ($validator->fails()) {
             return back()->withErrors($validator)->withInput();
         }
             $video =  Video::find($id);
             $video->video = $request->video;
             $video->status = $request->status;
             $video->save();
     
             return redirect()->route('videos.index')->with('success', 'Video Link edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Video::find($id)->delete();
        return redirect()->back()->with('success','video records delete successfully');
    }
}
