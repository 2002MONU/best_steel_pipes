<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry_Form;
use App\Rules\NoUrl;
use Illuminate\Support\Facades\Http;
use Closure;
use Illuminate\Support\Facades\Config;

class EnquiryController extends Controller
{
   public function enquiryPost(Request $request) {
    $request->validate([
        'full_name' => 'required|string',
        'mobile_no' => 'required|numeric|digits:10',
        'message' => 'required|string',
        'email' => 'required|email',
        'g-recaptcha-response' => ['required', function ($attribute, $value, $fail) use ($request) {
            $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $value,
                'remoteip' => $request->ip()
            ]);

            if (!$g_response->json('success')) {
                $fail('The ' . $attribute . ' is invalid.');
            }
        }]
    ]);

    $enquiry = new Enquiry_Form();
    $enquiry->full_name = $request->full_name;
    $enquiry->email = $request->email;
    $enquiry->mobile_no = $request->mobile_no;
    $enquiry->message = $request->message;
    $enquiry->save();

    return redirect()->back()->with('success', 'Enquiry form submitted successfully');
}

  // enquiry details show in admin 
public function  enquiryDetails() {
    $enqueries = Enquiry_Form::latest()->get();
     return view('admin.enqiry-details',compact('enqueries'));
    
}
   
       // enquiry message delete by admin
        public function enquirydelete($id) {
          $enquiry = Enquiry_Form::find($id)->delete();
          return redirect()->back()->with('success','enquiry message delete sucessfully');
        }
}
