<?php

namespace App\Http\Controllers\Auth;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('guest:admin',['except' => ['logout']]);
    }
 
    //function to show admin login form
    public function showLoginForm() {
        return view('admin.login');
    }
    //function to login admins
    public function login(Request $request) {
        //validate the form data
        $this->validate($request,[
            'uname' => 'required',
            'pword' => 'required'
        ]);
        //attempt to login the admins in
        if (Auth::guard('admin')->attempt(['username' => $request->uname, 'password' => $request->pword], false)){
            //if successful redirect to admin dashboard
            
            return redirect(route('admin.index'));
        }
        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('uname'));
    }
 
    public function logout()
    {
        Auth::guard('admin')->logout(false);
 
        return redirect('admin/login');
    }
}
