<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController\IndexPageController;
use App\Http\Controllers\WebsiteController\ProductController;
use App\Http\Controllers\AdminController\LoginController;
use App\Http\Controllers\AdminController\DashboardController;
use App\Http\Controllers\AdminController\SliderController;
use App\Http\Controllers\AdminController\AboutPageController;
use App\Http\Controllers\AdminController\BrandController;
use App\Http\Controllers\AdminController\ContactController;
use App\Http\Controllers\AdminController\ContactDetailController;
use App\Http\Controllers\AdminController\EnquiryController;
use App\Http\Controllers\AdminController\GalleryController;
use App\Http\Controllers\AdminController\OurAchievementController;
use App\Http\Controllers\AdminController\TestinomialController;
use App\Http\Controllers\AdminController\ProductCategoryController;
use App\Http\Controllers\AdminController\ProductDetailController;
use App\Http\Controllers\AdminController\ProductImageController;
use App\Http\Controllers\AdminController\ProductServiceController;
use App\Http\Controllers\AdminController\ProductSubCategoryController;
use App\Http\Controllers\AdminController\SeoSettingController;
use App\Http\Controllers\AdminController\SiteSettingController;
use App\Http\Controllers\AdminController\VideoController;
use App\Models\OurAchievement;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[IndexPageController::class,'index'])->name('home.index');
Route::get('/about-us',[IndexPageController::class,'about'])->name('home.abouts-us');
Route::get('/product',[ProductController::class,'product'])->name('home.product');
Route::get('/gallery',[IndexPageController::class,'gallery'])->name('home.gallery');
Route::get('/contact',[IndexPageController::class,'contact'])->name('home.contact');

Route::get('product',[ProductController::class,'product'])->name('home.product');
Route::get('/product-details/{slug}',[ProductController::class,'productDetails'])->name('home.product-details');
Route::get('/product-sub-details/{sub_slug}',[ProductController::class,'productSubDetails'])->name('home.product-sub-details');

Route::post('enquiry-post',[EnquiryController::class,'enquiryPost'])->name('enquiry-post');


Route::group(['prefix'=>'admin'],function(){
    Route::get('/login',[LoginController::class,'adminLogin'])->name('admin.login');
    Route::post('/login-post',[LoginController::class,'adminLoginPost'])->name('admin.loginPost');
     // middleware 
    Route::group(['middleware'=>'is_admin'],function(){
    Route::get('/dashboard',[DashboardController::class,'adminDashboard'])->name('admin.dashboard');
    Route::get('/change-password',[DashboardController::class,'changePassword'])->name('admin.change-password');
    Route::post('/change-password-post',[DashboardController::class,'changePasswordPost'])->name('admin.change-password-post');
    Route::get('/logout',[LoginController::class,'adminLogout'])->name('logout');
    Route::resource('/sliders',SliderController::class);
    Route::resource('/aboutpages',AboutPageController::class);
    Route::resource('/brands',BrandController::class);
    Route::resource('/testinomials',TestinomialController::class);
    Route::resource('/galleries',GalleryController::class);
    Route::resource('ourachievements',OurAchievementController::class);
  
    // product 
    Route::resource('/productcategories',ProductCategoryController::class);
    Route::resource('/productsubcategories',ProductSubCategoryController::class);
    Route::resource('/productimages',ProductImageController::class);
    Route::resource('/productservices',ProductServiceController::class);
    Route::resource('/contacts',ContactController::class);
    Route::resource('/contactdetails', ContactDetailController::class);
    Route::resource('/seosettings',SeoSettingController::class);
    Route::resource('/getintouchs', App\Http\Controllers\AdminController\GetintouchController::class);
    Route::resource('/videos',VideoController::class); 
    Route::get('enquiry-details',[EnquiryController::class,'enquiryDetails'])->name('enquiry-details');
    Route::get('enquiry-delete/{id}',[EnquiryController::class,'enquirydelete'])->name('enquiry-delete'); 
    Route::resource('sitesettings',SiteSettingController::class);
});
 });