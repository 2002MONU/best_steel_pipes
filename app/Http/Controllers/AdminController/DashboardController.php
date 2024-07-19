<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\OurAchievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\BrachName;
use App\Models\Brand;
use App\Models\Gallery;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\SeoSetting;
use App\Models\Slider;
use App\Models\Testinomial;

class DashboardController extends Controller
{
    public function adminDashboard(){
        if (auth()->guard('admin'))
       {
        $seo_setting = SeoSetting::find(1);
        $banner = Slider::count();
        $brands = Brand::count();
        $testinomial = Testinomial::count();
        $category = ProductCategory::count();
        $sub_category = ProductSubCategory::count('productsubcategory');
        $branch = BrachName::where('status',1)->count();
        $gallery = Gallery::count();
         return view('admin.dashboard',compact('seo_setting','banner','brands','testinomial','category','sub_category','branch','gallery'));
    }
    return redirect('admin/login')->with('error', 'Opps! You do not have access');
    }


   public function changePassword(){
    if(auth()->guard('admin')){
        return view('admin.change-password');
        }
        return redirect('admin/login')->with('error','Please Login First');
   }

   public function changePasswordPost(Request $request){
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|same:confirm_password|min:8',
        'confirm_password' => 'required|same:new_password',
    ]);

    // Get the currently authenticated admin
    $admin = auth()->guard('admin')->user();

    // Check if the old password is correct
    if (!Hash::check($request->old_password, $admin->password)) {
        return back()->with('error', "Current password is invalid");
    }

    // Check if the new password is the same as the old password
    if ($request->old_password === $request->new_password) {
        return back()->with('error', "New password cannot be the same as your current password.");
    }

    // Update the new password
    $admin->password = Hash::make($request->new_password);
    $admin->save();

    return redirect()->back()->with('success', "Password changed successfully!");
}
   }


