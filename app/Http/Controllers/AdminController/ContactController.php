<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\BrachName;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $branches = BrachName::get();
        return view('admin.branch-details',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('admin.add-branch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    return $request;
        $request->validate([
            'branch_name' => 'required|string',
            'status' => 'required',
        ]);
        $branch = new BrachName;
        $branch->branch_name = $request->branch_name;
        $branch->status = $request->status;
        $branch->save();

        return redirect()->route('contacts.index')->with('success','Branch add successfully');
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
        $branch = BrachName::find($id);
        return view('admin.edit-branch',compact('branch'));
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
            'branch_name' => 'required|string',
            'status' => 'required',
        ]);
        $branch =  BrachName::find($id);
        $branch->branch_name = $request->branch_name;
        $branch->status = $request->status;
        $branch->save();

        return redirect()->route('contacts.index')->with('success','Branch Edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BrachName::find($id)->delete();
        return redirect()->back()->with('success','Branch name delete successfully');
    }
}
