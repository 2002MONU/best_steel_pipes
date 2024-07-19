<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productcate = ProductCategory::get();
        return view('admin.product.product-details' ,compact('productcate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.product.add-product-category');
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
            'productcategory' => 'required|string|max:100',
            'status' => 'required|in:1,0',
        ]);

        $productcate = new ProductCategory;
        $productcate->productcategory = $request->productcategory;
        $productcate->slug = Str::slug($request->productcategory);
        $productcate->status = $request->status;
        $productcate->save();

        return redirect()->route('productcategories.index')->with('success','Product category name add successfully');
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
        $pro_categories = ProductCategory::find($id);
        return view('admin.product.edit-category', compact('pro_categories'));
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
            'productcategory' => 'required|string|max:100',
            'status' => 'required|in:1,0',
        ]);

        $pro_categories = ProductCategory::find($id);
        $pro_categories->productcategory = $request->productcategory;
        $pro_categories->slug = Str::slug($request->productcategory);
        $pro_categories->status = $request->status;
        $pro_categories->save();

        return redirect()->route('productcategories.index')->with('success','Product category Edit name add successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = ProductCategory::find($id);
        $category->delete();
        return redirect()->back()->with('success','records successfully');
    }
}
