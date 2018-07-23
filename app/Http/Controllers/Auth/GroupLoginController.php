<?php

namespace App\Http\Controllers\Auth;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Group;
use Illuminate\Support\Facades\Hash;

class GroupLoginController extends Controller
{
    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('guest',['except' => ['logout']]);
    }
 
    //function to show admin login form
    public function showLoginForm() {
        return view('peserta.login');
    }

    //function to login admins
    public function login(Request $request) {

        //validate the form data
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        // return $activ;
        //attempt to login the admins in
        if (Auth::attempt(["username"=>$request->username,"password"=>$request->password, "verified_email"=>1], false)){
            //if successful redirect to admin dashboard
            
            return redirect(route('dashboard.index'));
        }
        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('username'))->with('error','Username atau Password Tidak Ditemukan');
    }
 
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
