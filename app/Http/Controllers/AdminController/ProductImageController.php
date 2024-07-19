<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ProductImage::leftJoin('product_sub_categories', 'product_sub_categories.id', '=', 'product_images.sub_category_id')
    ->leftJoin('product_categories', 'product_categories.id', '=', 'product_images.category_id')
    ->select(
        'product_categories.productcategory as category_name', 
        'product_sub_categories.productsubcategory as subcategory_name',
        'product_images.id',
          'product_images.heading',
           'product_images.value',// ID of the image
        'product_images.status',
        'product_images.updated_at'
    )
    ->get();
    
//    dd($categories);

    // ->groupBy('category_id');
     return view('admin.product.image-details',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category  = ProductCategory::where('status',1)->get();
        $sub_category = ProductSubCategory::where('status',1)->get();
        return view('admin.product.add-image',compact('category','sub_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // return $request;
    $request->validate([
//        'images.*' => 'required|image|mimes:jpeg,png,jpg',
        'heading' => 'required',
        'value' => 'required',
        'status' => 'required',
        // 'category_id' => 'nullable|integer', // Ensure category_id is an integer or null
        // 'sub_category_id' => 'nullable|integer', // Ensure sub_category_id is an integer or null
    ]);

   
    

    // Assuming you want to store each image with the same category and sub-category
    // foreach($imageNames as $name) {
        $proimage = new ProductImage;
       $proimage->category_id = $request->category_id;
        $proimage->sub_category_id = $request->sub_category_id;
        $proimage->status = $request->status; 
         $proimage->heading = $request->heading;
          $proimage->value = $request->value;
        $proimage->save();
    // }

         return redirect()->route('productimages.index')->with('success','Images uploaded successfully');
        
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
        $image = ProductImage::find($id);
        $category = ProductCategory::where('status',1)->get();
        $sub_category = ProductSubCategory::where('status',1)->get();
        return view('admin.product.edit-image',compact('image','category','sub_category'));
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
             'heading' => 'required',
             'value' => 'required',
            'status' => 'required',
            // 'category_id' => 'nullable|integer', // Ensure category_id is an integer or null
            // 'sub_category_id' => 'nullable|integer', // Ensure sub_category_id is an integer or null
        ]);
        $proimage =  ProductImage::find($id);
        
    
        // Assuming you want to store each image with the same category and sub-category
        // foreach($imageNames as $name) {
           
           $proimage->category_id = $request->category_id;
            $proimage->sub_category_id = $request->sub_category_id;
            $proimage->status = $request->status; 
           $proimage->heading = $request->heading;
          $proimage->value = $request->value;
            $proimage->save();
        // }
    
             return redirect()->route('productimages.index')->with('success','Images uploaded successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = ProductImage::find($id);
       
           $image->delete();

           return redirect()->back()->with('image delete successfully');
                
              }
   
}
