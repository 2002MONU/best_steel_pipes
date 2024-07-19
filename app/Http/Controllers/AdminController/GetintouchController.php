<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TextDetail;
class GetintouchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $getin = TextDetail::find(1);
        return view('admin.getintouch.getintouch-details', compact('getin'));
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
        $getin = TextDetail::find($id);
        return view('admin.getintouch.edit-getintouch',compact('getin'));
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
            'phone_01' => 'required|numeric',
            'phone_02' => 'required|numeric',
            'email_01' => 'required|email',
            'email_02' => 'required|email',
            'call_no' => 'required|numeric',
            'whatsapp' => 'required|numeric',
        ]);

        $getintouch = TextDetail::find($id);
        $getintouch->phone_01 = $request->phone_01;
        $getintouch->phone_02 = $request->phone_02;
        $getintouch->email_01 = $request->email_01;
        $getintouch->email_02 = $request->email_02;
        $getintouch->call_no = $request->call_no;
        $getintouch->whatsapp = $request->whatsapp;
         $getintouch->save();

        return redirect()->route('getintouchs.index')->with('success','Get In Touch Edit successfully');
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
