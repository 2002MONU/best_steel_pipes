<?php

namespace App\Http\Controllers\WebsiteController;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SeoSetting;
use App\Models\Site_setting;

class ProductController extends Controller
{
    // public function product(){
    //     return view('website.product');
    // }
// category details show 
    public function productDetails($slug){
        $pro_categories = ProductCategory::
        join('product_sub_categories', 'product_sub_categories.productcategory_id', '=', 'product_categories.id')
        ->leftJoin('product_images', function ($join) {
            $join->on('product_images.sub_category_id', '=', 'product_sub_categories.productsubcategory')
                 ->orOn('product_images.category_id', '=', 'product_categories.id');
        })
        ->leftJoin('product_services', function ($join) {
            $join->on('product_services.sub_category_id', '=', 'product_sub_categories.productsubcategory')
                 ->orOn('product_services.category_id', '=', 'product_categories.id');
        })
        ->where('product_categories.status', '=', 1)
        ->where('product_sub_categories.status', '=', 1)
        ->where('product_categories.slug', $slug)
        ->select([
            'product_categories.id as category_id',
            'product_categories.slug',
            'product_categories.productcategory',
            'product_sub_categories.id as subcategory_id',
            'product_sub_categories.sub_slug',
            'product_sub_categories.productsubcategory as sub_category_name',
            'product_sub_categories.productcategory_id',
            'product_sub_categories.url',
            'product_sub_categories.title',
            'product_sub_categories.price',
            'product_sub_categories.unit',
            'product_sub_categories.images',
            'product_sub_categories.description',
            'product_sub_categories.services',
            'product_images.sub_category_id as image_sub_category_id',
            'product_images.category_id as image_category_id',
            'product_images.image as product_image',
            'product_services.sub_category_id as service_sub_category_id',
            'product_services.category_id as service_category_id',
        ])->first();
      //  dd($sub_categories);
        
        // product  services details
        $product_categories = ProductCategory::
        join('product_sub_categories', 'product_sub_categories.productcategory_id', '=', 'product_categories.id')
       ->leftJoin('product_services', function ($join) {
            $join->on('product_services.sub_category_id', '=', 'product_sub_categories.productsubcategory')
                 ->orOn('product_services.category_id', '=', 'product_categories.id');
        })
        ->where('product_categories.status', '=', 1)
        ->where('product_sub_categories.status', '=', 1)
        ->where('product_categories.slug', $slug)
                 ->whereNotNull('product_services.category_id')
         ->select([
            'product_services.category_id',
            'product_services.title as service_title',
            'product_services.image as service_image',
            'product_services.description as service_description',
        ])->where('product_categories.slug', $slug)->get();
    //dd($product_categories);
    //product type details
    $product_categories_type = ProductCategory::
                join('product_sub_categories', 'product_sub_categories.productcategory_id', '=', 'product_categories.id')
                ->leftJoin('product_images', function ($join) {
                    $join->orWhere('product_images.sub_category_id', '=', 'product_sub_categories.productsubcategory')
                         ->orOn('product_images.category_id', '=', 'product_categories.id');
                })
                ->where('product_categories.status', '=', 1)
                ->where('product_sub_categories.status', '=', 1)
                ->where('product_categories.slug', $slug)
                ->whereNotNull('product_images.category_id')
                ->select([
                    'product_images.sub_category_id',
                    'product_images.value',
                    'product_images.heading',
                 ])->where('product_categories.slug', $slug)->get();
                
                
       // product side bar product details show 
        $categories = \App\Models\ProductCategory::where('status', 1)->latest()->get();
      
        foreach ($categories as $value) {
            $sub_category = ProductSubCategory::where('productcategory_id', $value->id)
                                ->where('status', 1)
                                ->select('id', 'productsubcategory', 'sub_slug')
                                ->where('productsubcategory', '!=', null)
                                ->get();
            if(count($sub_category) > 0) {
                $value->sub_category = $sub_category;
            } else {
                $value->sub_category = [];
            }
        }
        
        // product details banner
        $site_details = Site_setting::find(1);
        return view('website.pipes-details',compact('pro_categories','site_details','product_categories','categories','product_categories_type'));
    }

    
    // product page sub details show 
    public function productSubDetails($sub_slug)
{
        // product sub category details show 
    $sub_categories = ProductCategory::
        join('product_sub_categories', 'product_sub_categories.productcategory_id', '=', 'product_categories.id')
        ->leftJoin('product_images', function ($join) {
            $join->on('product_images.sub_category_id', '=', 'product_sub_categories.productsubcategory')
                 ->orOn('product_images.category_id', '=', 'product_categories.id');
        })
        ->leftJoin('product_services', function ($join) {
            $join->on('product_services.sub_category_id', '=', 'product_sub_categories.productsubcategory')
                 ->orOn('product_services.category_id', '=', 'product_categories.id');
        })
        ->where('product_categories.status', '=', 1)
        ->where('product_sub_categories.status', '=', 1)
        ->select('product_categories.id as category_id',
                 'product_categories.slug',
                 'product_categories.productcategory',
                 'product_sub_categories.id as subcategory_id',
                 'product_sub_categories.sub_slug',
                 'product_sub_categories.productsubcategory as sub_category_name',
                 'product_sub_categories.productcategory_id',
                 'product_sub_categories.url',
                 'product_sub_categories.title',
                'product_sub_categories.price',
                'product_sub_categories.unit',
                'product_sub_categories.images',
                 'product_sub_categories.description',
                 'product_sub_categories.services',
                 'product_sub_categories.priority',
                 'product_images.sub_category_id',
                 'product_images.category_id',
                // 'product_images.heading as head',
                // 'product_images.value',
                 'product_services.sub_category_id',
                 'product_services.category_id',
                )
                 ->where('product_sub_categories.sub_slug', $sub_slug)
                ->first();
       
               //dd($sub_categories);
                 // product images show 
                $product_categories = ProductCategory::
                join('product_sub_categories', 'product_sub_categories.productcategory_id', '=', 'product_categories.id')
                ->leftJoin('product_services', function ($join) {
                    $join->on('product_services.sub_category_id', '=', 'product_sub_categories.productsubcategory')
                         ->orWhere('product_services.category_id', '=', 'product_categories.id');
                })
                ->where('product_categories.status', '=', 1)
                ->where('product_sub_categories.status', '=', 1)
                ->where('product_sub_categories.sub_slug', $sub_slug)
                 ->whereNotNull('product_services.sub_category_id')
                ->select([
                    'product_services.sub_category_id',
                    'product_services.title as service_title',
                    'product_services.image as service_image',
                    'product_services.description as service_description',
                ])->where('product_sub_categories.sub_slug', $sub_slug)->get();
                //dd($product_categories);
                
                // product type details
              $product_categories_type = ProductCategory::join('product_sub_categories', 'product_sub_categories.productcategory_id', '=', 'product_categories.id')
                ->leftJoin('product_images', function ($join) {
                    $join->on('product_images.sub_category_id', '=', 'product_sub_categories.productsubcategory')
                         ->orWhere('product_images.category_id', '=', 'product_categories.id');
                })
                ->where('product_categories.status', 1)
                ->where('product_sub_categories.status', 1)
                ->where('product_sub_categories.sub_slug', $sub_slug)
                ->whereNotNull('product_images.sub_category_id') // Ensure only records with matching sub_category_id
                ->select([
                    'product_images.sub_category_id',
                    'product_images.value',
                    'product_images.heading',
                ])
                ->get();

                //dd($product_categories_type);


                
                
                // product sidebar navbar show 
        $categories = \App\Models\ProductCategory::where('status', 1)->latest()->get();
         foreach ($categories as $value) {
                $sub_category = ProductSubCategory::where('productcategory_id', $value->id)
                                    ->where('status', 1)
                                    ->select('id', 'productsubcategory', 'sub_slug')
                                    ->where('productsubcategory', '!=', null)
                                    ->get();
                if(count($sub_category) > 0) {
                    $value->sub_category = $sub_category;
                } else {
                    $value->sub_category = [];
                }
            }
             // product banner details 
            $site_details = Site_setting::find(1);
     return view('website.sub-category-details',compact('sub_categories','product_categories','categories','site_details','product_categories_type'));
}


   // all product details 
   public function product() {
       $site_details = Site_setting::find(1);
       $our_product = ProductSubCategory::join('product_categories', 'product_categories.id', '=', 'product_sub_categories.productcategory_id')
     ->select(
        'product_categories.productcategory as title',
        'product_categories.slug',
        'product_sub_categories.sub_slug',
        'product_sub_categories.productsubcategory as sub_title',
        'product_sub_categories.description',
        'product_sub_categories.images',
        'product_sub_categories.priority'

    )->orderBy('priority', 'ASC')
    ->get();
       return view('website.product',compact('site_details','our_product'));
   }

}
