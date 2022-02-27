<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminAuthController extends Controller
{
    //
    public function __construct(){
        $this->middleware('adminauth:admin',['except'=>'logout']);
    }
    public function showLogin(){
        return view('admin.auth.login',[
            'title'=>'Login admin page'
        ]);
    }
    public function login(Request $request){
        $validatedData = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$validatedData['email'], 'password'=>$validatedData['password']])){
            Admin::find(auth('admin')->user()->id)->update(['remember_token'=>Str::random(50)]);
            session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->with('failedLogin','Invalid email or password');
    }
    public function logout(Request $request){
        
        Admin::find(auth('admin')->user()->id)->update(['remember_token'=>null]);
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/auth/admin/login');
    }
}
