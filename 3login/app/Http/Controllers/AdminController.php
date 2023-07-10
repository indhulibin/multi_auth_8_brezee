<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class AdminController extends Controller
{
    public function Index()
    {
        return view('admin.admin_login');
    }
    //End the function

    public function Dashboard()
    {
        return view('admin.index');
    }
    //End the function

    public function Login(Request $request)
    {
         // dd($request->all());

         $check = $request->all();
         if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']  ])){
             return redirect()->route('admin.dashboard')->with('error','Admin Login Successfully');
         }
         else
         {
             return back()->with('error','Invaild Email Or Password');
         }
    }
    //End the function

    public function Logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error','Admin Logout Successfully');
    }
    //End the function


}
