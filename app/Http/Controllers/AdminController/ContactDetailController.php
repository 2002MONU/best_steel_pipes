<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\BrachName;
use App\Models\ContactDetails;
use Illuminate\Http\Request;

class ContactDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = ContactDetails::join('brach_names', 'brach_names.id', '=', 'contact_details.branch_id')
        ->select(
            'brach_names.branch_name',
            'contact_details.phone_no_1',
            'contact_details.phone_no_2',
            'contact_details.email_01',
            'contact_details.email_02',
            'contact_details.address',
            'contact_details.map_link',
            'contact_details.branch_id',
            'contact_details.status',
            'contact_details.id',
            'contact_details.updated_at',
        )->where('contact_details.status',1) ->get();
        return view('admin.branch-contact-details',compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = BrachName::where('status',1)->get();
        return view('admin.add-branch-contact',compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'branch_id' => 'required',
            'phone_no_1' => 'required|integer|digits:10',
            'phone_no_2' => 'nullable|integer|digits:10',
            'email_01' => 'required|email|string',
            'email_02' => 'nullable|email|string',
            'address' => 'required|string',
            'map_link' => 'required|url',
            'status' => 'required',
        ]);
        $branch_details = new ContactDetails;
        $branch_details->branch_id = $request->branch_id;
        $branch_details->phone_no_1 = $request->phone_no_1;
        $branch_details->phone_no_2 = $request->phone_no_2;
        $branch_details->email_01 = $request->email_01;
        $branch_details->email_02 = $request->email_02;
        $branch_details->address = $request->address;
        $branch_details->map_link = $request->map_link;
        $branch_details->status = $request->status;
        $branch_details->save();

        return redirect()->route('contactdetails.index')->with('success','branch details add successfully');
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
        $branches = BrachName::where('status',1)->get();
        $branch_details = ContactDetails::find($id);
        return view('admin.edit-contact-details',compact('branches','branch_details'));
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
            'branch_id' => 'required',
            'phone_no_1' => 'required|integer|digits:10',
            'phone_no_2' => 'nullable|integer|digits:10',
            'email_01' => 'required|email|string',
            'email_02' => 'nullable|email|string',
            'address' => 'required|string',
            'map_link' => 'required|url',
            'status' => 'required',
        ]);
        $branch_details = ContactDetails::find($id);
        $branch_details->branch_id = $request->branch_id;
        $branch_details->phone_no_1 = $request->phone_no_1;
        $branch_details->phone_no_2 = $request->phone_no_2;
        $branch_details->email_01 = $request->email_01;
        $branch_details->email_02 = $request->email_02;
        $branch_details->address = $request->address;
        $branch_details->map_link = $request->map_link;
        $branch_details->status = $request->status;
        $branch_details->save();

        return redirect()->route('contactdetails.index')->with('success','branch details edit successfully');
    
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
