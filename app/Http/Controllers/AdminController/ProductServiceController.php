<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductService;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
   {
    $categories  = DB::table('product_services')
        ->leftJoin('product_categories', 'product_services.category_id', '=', 'product_categories.id')
        ->leftJoin('product_sub_categories', 'product_services.sub_category_id', '=', 'product_sub_categories.id')
        ->select(
            'product_services.id as service_id',
            'product_services.title',
            'product_services.image',
            'product_services.updated_at',
            'product_services.status',
            'product_categories.id as category_id',
            'product_categories.productcategory',
            'product_sub_categories.id as subcategory_id',
            'product_sub_categories.productsubcategory'
        )
        ->get()
        ->groupBy('category_id');

    return view('admin.product.services-view', compact('categories'));
}

    
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = ProductCategory::where('status',1)->get();
        $sub_category = ProductSubCategory::where('status',1)->get();
        return view('admin.product.add-services',compact('category','sub_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
    // Validate the request data
    $validatedData = $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg',
        'status' => 'required',
        'category_id' => 'nullable|integer',
        'sub_category_id' => 'nullable|integer',
        'title' => 'required|string|max:255',
        'description' => 'required|string|max:100',
    ]);

    // Handle the file upload
    $file = $request->file('image');
    $filename = time() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('assets/dynamics/product'), $filename);

    // Create a new ProductService instance and save the data
    $service = new ProductService;
    $service->image = $filename;
    $service->category_id = $request->category_id;
    $service->sub_category_id = $request->sub_category_id;
    $service->title = $request->title;
    $service->description = $request->description;
    $service->status = $request->status;
    $service->save(); // Don't forget to save the new instance

    // Redirect to the index route with a success message
    return redirect()->route('productservices.index')->with('success', 'Service added successfully');
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
        $services = ProductService::find($id);
        $categories = ProductCategory::where('status',1)->get();
        $sub_categories = ProductSubCategory::where('status',1)->get();
       return view('admin.product.edit-service',compact('services','categories','sub_categories'));
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
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg',
            'status' => 'required',
            'category_id' => 'nullable|integer',
            'sub_category_id' => 'nullable|integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:100',
        ]);
        $service = ProductService::find($id);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $img_extension = $image->getClientOriginalExtension();
            $name = time() . '.' . $img_extension;
            $image->move(public_path('assets/dynamics/product'), $name);
            $service->image =  $name;
        }

       
        $service->category_id = $request->category_id;
        $service->sub_category_id = $request->sub_category_id;
        $service->title = $request->title;
        $service->description = $request->description;
        $service->status = $request->status;
        $service->save(); // Don't forget to save the new instance
    
        // Redirect to the index route with a success message
        return redirect()->route('productservices.index')->with('success', 'Service Edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = ProductService::find($id);
        $service->delete();
        return redirect()->back()->with('success','records delete successfully');
    }
}
