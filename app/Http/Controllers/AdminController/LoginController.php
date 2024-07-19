<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
       
    // admin login form
    public function adminLogin(){
        return view('admin.account.login');
    }

    // admin login
    public function adminLoginPost(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        
        $credentials = $request->only('email', 'password');
        
        if (auth()->guard('admin')->attempt($credentials)) {
            $user = auth()->guard('admin')->user();
            return redirect('admin/dashboard')->with('success', 'You are logged in successfully.');
        } else {
            // Check if the email exists in the database
            $emailExists = \App\Models\Admin::where('email', $request->input('email'))->exists();
        
            if ($emailExists) {
                // Email is correct, so the password must be wrong
                return back()->withErrors(['password' => 'Invalid password.']);
            } else {
                // Email is wrong
                return back()->withErrors(['email' => 'Invalid email.']);
            }
        }
     }

     // admin logout 
     public function adminLogout(){
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        }
        return redirect()->route('admin.login')->with('success','Admin Logout Succcessfully');
     }
}
