<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurAchievement;
class OurAchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievements = OurAchievement::find(1);
        return view('admin.slider.ourachievement-details',compact('achievements'));
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
        $our_achievement = OurAchievement::find($id);
       return view('admin.slider.edit-ourachievement',compact('our_achievement'));
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
            'project_complete' => 'required|numeric',
            'satisfied_client' => 'required|numeric',
            'experienced_staff' => 'required|numeric',
            'award_win' => 'required|numeric',
            'project_icon1' => 'image|mimes:jpg,png,jpeg|max:256',
            'satisfied_icon2' => 'image|mimes:jpg,png,jpeg|max:256',
            'experienced_icon3' => 'image|mimes:jpg,png,jpeg|max:256',
            'award_icon4' => 'image|mimes:jpg,png,jpeg|max:256',
        ]);
     $our_achievement = OurAchievement::find($id);
        foreach (['project_icon1', 'satisfied_icon2', 'experienced_icon3', 'award_icon4'] as $imageField) {
            if ($request->hasFile($imageField)) {
                $file = $request->file($imageField);
                $filename = time() .'.' . $file->getClientOriginalExtension();
                $file->move(public_path('website/dynamics/slider'), $filename);
                $our_achievement->$imageField = $filename;
            }
        }

        $our_achievement->project_complete = $request->project_complete;
        $our_achievement->satisfied_client = $request->satisfied_client;
        $our_achievement->experienced_staff = $request->experienced_staff;
        $our_achievement->award_win = $request->award_win;
        $our_achievement->save();

        return redirect()->route('ourachievements.index')->with('success','Our achievements edit successfully');
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
