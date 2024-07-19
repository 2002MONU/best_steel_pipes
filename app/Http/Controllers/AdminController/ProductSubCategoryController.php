<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\ProductImage;
use App\Models\ProductService;
class ProductSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = DB::table('product_sub_categories')
        ->select(
            'product_sub_categories.status',
            'product_sub_categories.productsubcategory',
            'product_sub_categories.title',
            'product_sub_categories.priority',
            'product_sub_categories.created_at',
            'product_sub_categories.updated_at',
            'product_categories.productcategory',
            'product_sub_categories.id')
        ->join('product_categories', 'product_categories.id', '=', 'product_sub_categories.productcategory_id')
       ->get();
        return view('admin.product.sub-category-details',compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_category = ProductCategory::where('status',1)->get();
        return view('admin.product.add-sub-category',compact('product_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'productsubcategory' => 'nullable|string|max:100',
        'productcategory_id' => 'required|integer',
        'status' => 'required|in:1,0',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'url' => 'nullable|max:255',
        'services' => 'required|string',
        'price' => 'required',
        'unit' => 'required|string',
        'images.*' => 'required|image|mimes:jpeg,png,jpg',
        'priority' => 'nullable|integer|unique:product_sub_categories,priority',
        'headings.*' => 'nullable|string|max:255',
        'values.*' => 'nullable|string',
         'application_image.*' => 'nullable|image|mimes:jpeg,png,jpg',
        'application_title.*' => 'nullable|string|max:255',
        'application_descriptions.*' => 'nullable|string',
    ]);

    $imageNames = [];

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/dynamics/product'), $name);
            $imageNames[] = $name;
        }
    }

    $sub_category = new ProductSubCategory;
    $sub_category->productsubcategory = $request->productsubcategory;
    $sub_category->productcategory_id = $request->productcategory_id;
    $sub_category->sub_slug = Str::slug($request->title);
    $sub_category->status = $request->status;
    $sub_category->title = $request->title;
    $sub_category->description = $request->description;
    $sub_category->url = $request->url;
    $sub_category->services = $request->services;
    $sub_category->price = $request->price;
    $sub_category->unit = $request->unit;
    $sub_category->priority = $request->priority;
    $sub_category->images = json_encode($imageNames);

    $sub_category->save();

    // Save headings and values
    if ($request->filled('headings') && $request->filled('values')) {
        $headings = $request->headings;
        $values = $request->values;

        foreach ($headings as $index => $heading) {
            $data = new ProductImage();
            $data->category_id = $sub_category->productcategory_id;
            $data->sub_category_id = $sub_category->productsubcategory;
            $data->heading = $heading;
            $data->value = $values[$index] ?? null;
            $data->save();
        }
    }

    if ($request->hasFile('application_image')) {
        $app_titles = $request->application_title;
        $app_descriptions = $request->application_descriptions;
        $application_images = $request->file('application_image');
        foreach ($application_images as $index => $app_image) {
            $name = time() . '_' . uniqid() . '.' . $app_image->getClientOriginalExtension();
            $app_image->move(public_path('assets/dynamics/product'), $name);
            $data = new ProductService();
            $data->category_id = $sub_category->productcategory_id;
            $data->sub_category_id = $sub_category->productsubcategory;
            $data->image = $name;
            $data->title = $app_titles[$index] ?? null;
            $data->description = $app_descriptions[$index] ?? null;
            $data->save();
        }
    }

    // Redirect to the index route with a success message
    return redirect()->route('productsubcategories.index')->with('success', 'Sub category and other details added successfully');
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
        $product_category = ProductCategory::where('status',1)->get();
        $sub_category = ProductSubCategory::find($id);
        return view('admin.product.edit-sub-category',compact('sub_category','product_category'));
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
        // return $request;
        $request->validate([
        'productsubcategory' => 'nullable|string|max:100',
        'productcategory_id' => 'required|integer',
        'status' => 'required|in:1,0',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'url' => 'nullable|max:255',
        'services' => 'required|string',
        'price' => 'required',
        'unit' => 'required|string',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg',
        'priority' => 'nullable|integer|unique:product_sub_categories,priority,' . $id,
        'headings.*' => 'nullable|string|max:255',
        'values.*' => 'nullable|string',
        'application_image.*' => 'nullable|image|mimes:jpeg,png,jpg',
        'application_title.*' => 'nullable|string|max:255',
        'application_descriptions.*' => 'nullable|string',
    ]);

    DB::transaction(function () use ($request, $id) {
        // Update ProductSubCategory
        $subCategory = ProductSubCategory::findOrFail($id);
        $subCategory->productsubcategory = $request->productsubcategory;
        $subCategory->productcategory_id = $request->productcategory_id;
        $subCategory->sub_slug = Str::slug($request->title);
        $subCategory->status = $request->status;
        $subCategory->title = $request->title;
        $subCategory->description = $request->description;
        $subCategory->url = $request->url;
        $subCategory->services = $request->services;
        $subCategory->price = $request->price;
        $subCategory->unit = $request->unit;
        $subCategory->priority = $request->priority;

        if ($request->hasFile('images')) {
            $imageNames = [];
            foreach ($request->file('images') as $image) {
                $name = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/dynamics/product'), $name);
                $imageNames[] = $name;
            }
            $subCategory->images = json_encode($imageNames);
        }

        $subCategory->save();

        // Update ProductImage
        if ($request->filled('headings') && $request->filled('values')) {
            $headings = $request->headings;
            $values = $request->values;

            // Delete existing ProductImage records
            ProductImage::where('sub_category_id', $subCategory->productsubcategory)->delete();

            // Insert new ProductImage records
            foreach ($headings as $index => $heading) {
                $data = new ProductImage();
                $data->category_id = $subCategory->productcategory_id;
                $data->sub_category_id = $subCategory->productsubcategory;
                $data->heading = $heading;
                $data->value = $values[$index] ?? null;
                $data->save();
            }
        }

        // Update ProductService
        if ($request->hasFile('application_image')) {
            $appTitles = $request->application_title;
            $appDescriptions = $request->application_descriptions;
            $applicationImages = $request->file('application_image');

            // Delete existing ProductService records
            ProductService::where('sub_category_id', $subCategory->productsubcategory)->delete();

            // Insert new ProductService records
            foreach ($applicationImages as $index => $appImage) {
                $name = time() . '_' . uniqid() . '.' . $appImage->getClientOriginalExtension();
                $appImage->move(public_path('assets/dynamics/product'), $name);

                $data = new ProductService();
                $data->category_id = $subCategory->productcategory_id;
                $data->sub_category_id = $subCategory->productsubcategory;
                $data->image = $name;
                $data->title = $appTitles[$index] ?? null;
                $data->description = $appDescriptions[$index] ?? null;
                $data->save();
            }
        }
    });

         return redirect()->route('productsubcategories.index')->with('success','Sub category and other details edit  successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $subCategory = ProductSubCategory::findOrFail($id);

    // Delete related images where sub_category_id matches
    DB::table('product_images')->where('sub_category_id', $subCategory->productsubcategory)->delete();

    // Delete related services where sub_category_id matches
    DB::table('product_services')->where('sub_category_id', $subCategory->productsubcategory)->delete();

    // Delete the sub-category itself
    $subCategory->delete();
        return redirect()->back()->with('success','Records delete successfully');
    }
}
