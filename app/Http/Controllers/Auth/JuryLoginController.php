<?php

namespace App\Http\Controllers\Auth;
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;

class JuryLoginController extends Controller
{
    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('guest:jury',['except' => ['logout']]);
    }
 
    //function to show jury login form
    public function showLoginForm() {
        return view('jury.login');
    }
    //function to login jury
    public function login(Request $request) {
        //validate the form data
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required'
        ]);
        //attempt to login the jury in
        
        if (Auth::guard('jury')->attempt(['username' => $request->username, 'password' => $request->password], false)){
            //if successful redirect to admin dashboard
            
            return redirect(route('jury.index'));
        }
        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('username'));
    }
 
    public function logout()
    {
        Auth::guard('jury')->logout(false);
 
        return redirect('juri/login');
    }
}
