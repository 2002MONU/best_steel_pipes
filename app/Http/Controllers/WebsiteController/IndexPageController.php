<?php

namespace App\Http\Controllers\WebsiteController;

use App\Http\Controllers\Controller;
use App\Models\AboutPage;
use App\Models\BrachName;
use App\Models\Brand;
use App\Models\ContactDetails;
use App\Models\Gallery;
use App\Models\OurAchievement;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\Slider;
use App\Models\Testinomial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SeoSetting;
use App\Models\Site_setting;
use App\Models\Video;

class IndexPageController extends Controller
{
    // website index
    public function index(){
        $slider = Slider::latest()->where('status',1)->get();
        $about = AboutPage::find(1); // Assuming 1 is the ID of the about page

        // Split the description into two parts
        $description = $about->description;
        $splitLength = strlen($description) / 2;
        $firstPart = substr($description, 0, $splitLength);
        $secondPart = substr($description, $splitLength);
    
        // Find the last space in the first part to avoid cutting off words
        $lastSpace = strrpos($firstPart, ' ');
        if ($lastSpace !== false) {
            $firstPart = substr($description, 0, $lastSpace);
            $secondPart = substr($description, $lastSpace);
        }

        $brands = Brand::latest()->where('status',1)->get();
        $testi = Testinomial::latest()->where('status',1)->get();


    $categories = ProductCategory::where('status', 1)->get();
      
      foreach ($categories as $value) {
        $sub_categories = \App\Models\ProductSubCategory::where('productcategory_id', $value->id)
                            ->where('status', 1)
                            ->select('id', 'productsubcategory', 'sub_slug')
                            ->where('productsubcategory', '!=', null)
                            ->get();
        if(count($sub_categories) > 0) {
            $value->sub_categories = $sub_categories;
        } else {
            $value->sub_categories = [];
        }
      }
    
    //dd($categories); // Check the output
    $site_details = Site_setting::find(1);
    $our_achievement = OurAchievement::find(1);

   $our_product = ProductSubCategory::join('product_categories', 'product_categories.id', '=', 'product_sub_categories.productcategory_id')
    ->select(
        'product_categories.productcategory as title',
        'product_categories.slug',
        'product_sub_categories.sub_slug',
        'product_sub_categories.productsubcategory as sub_title',
        'product_sub_categories.description',
        'product_sub_categories.priority',
        'product_sub_categories.images'
    )
    ->limit(4)
    ->orderBy('priority', 'ASC')
    ->get();


   // dd($our_product);
      return view('website.index',compact('slider','about', 'firstPart', 'secondPart', 'brands', 'testi','categories','site_details','our_achievement','our_product'));
    }


    public function about(){
        $about = AboutPage::find(1);
        $testi = Testinomial::latest()->where('status',1)->get();
        $site_details = Site_setting::find(1);
        $our_achievement = OurAchievement::find(1);
        return view('website.aboutus',compact('about','testi','site_details','our_achievement'));
    }

    public function gallery(){
        $galleries = Gallery::latest()->where('status',1)->get();
        $site_details = Site_setting::find(1);
        $videos = Video::get();
        return view('website.gallery',compact('galleries','site_details','videos'));
    }


    public function contact(Request $request){
        $site_details = Site_setting::find(1);
        $contactdetails = BrachName::where('status', 1)->get();
        $branchId = $request->query('branch_id');
        if ($branchId) {
            // Check if the branch ID is numeric
            if (!is_numeric($branchId)) {
                abort(404, 'Branch not found');
            }
    
            // Check if the branch exists and is active
            $branch = BrachName::where('id', $branchId)->where('status', 1)->first();
            if (!$branch) {
                abort(404, 'Branch not found');
            }
        }
    // Retrieve all contact details
        $details = ContactDetails::where('status', 1)->get();
        return view('website.contact',compact('contactdetails','details','site_details'));
    }


   
}
