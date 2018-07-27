<?php

namespace App\Http\Controllers\Auth;

use App\Group;
use App\Participant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use App\Shirt;
use App\Competition;

use Mail;
use App\Mail\EmailVerification;

class GroupRegisterController extends Controller
{
    use RedirectsUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'group_name' => 'required|string',
            'institution' => 'required|string',
            'full_name' => 'required|string',
            'birthdate' => 'required|date',
            'contact' => 'required|numeric',
            'vegetarian' => 'required',
            'photo' => 'required|max:500|mimes:jpeg,png',
            'buy_shirt' => 'required',
            'username' => 'required|string|max:255|unique:groups',
            'email' => 'required|string|email|max:255|unique:groups',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function single_validator(array $data)
    {
        return Validator::make($data, [
            'institution' => 'required|string',
            'full_name' => 'required|string',
            'birthdate' => 'required|date',
            'contact' => 'required|numeric',
            'vegetarian' => 'required',
            'photo' => 'required|max:500|mimes:jpeg,png',
            'buy_shirt' => 'required',
            'username' => 'required|string|max:255|unique:groups',
            'email' => 'required|string|email|max:255|unique:groups',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Group
     */
    protected function create(array $data)
    {
        return Group::create($data);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {   
        $data = $request->all();
        //$validator = $this->validator($data);

        $data['password'] = Hash::make($data['password']);

        $data['email_token'] = bin2hex(openssl_random_pseudo_bytes(30));
        $data['regist_cost'] = Competition::find($data['competition_id'])->regist_cost;
        
        if(!(array_key_exists("group_name",$data))){
            //single competition
            $data['group_name'] = $data['full_name'];
            $this->single_validator($request->all())->validate();
            
        } else {
            //group competition
            $this->validator($request->all())->validate();
        }

        event(new Registered($user = $this->create($data)));

        //$this->guard()->login($user);

        $email = new EmailVerification($user);

        Mail::to($user->email)->send($email);

        $data['group_id'] = $user->id;
        $data['photo'] = $request->competition_id."_".$request->full_name.".".$request->file('photo')->getClientOriginalExtension();
        $data['captain'] = 1;
        
        Participant::uploadPhoto($request->file('photo'), $data['photo']);
        Participant::create($data);
        

        return redirect()->to('login')->with('success','Kami telah mengirim link untuk aktivasi akun anda, silakan cek email anda'); 

        /*return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());*/
    }

    public function verify($token)
    {
    	if (!$token) {
    		return redirect('login')->with('error','Kode aktivasi tidak ditemukan');
    	}

    	$user = Group::where('email_token',$token)->first();

    	if ($user->verified_email==1) {
    		return redirect('login')->with('warning','Akun anda telah diaktivasi');
    	}

    	if (!$user) {
    		return redirect('login')->with('error','Kode aktivasi salah');
    	}

    	$user->verified_email = 1;

    	if ($user->save()) {
    		return redirect('login')->with('success','Aktivasi akun berhasil');
    	}

    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }

    
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProgRegistrationForm()
    {
        $data['harga_baju'] = Shirt::find(1)->price;
        $data['competition'] = Competition::find(1);
        return view('peserta.sign-up-prog', $data);
    } 

    public function showWebRegistrationForm()
    {
        $data['harga_baju'] = Shirt::find(1)->price;
        $data['competition'] = Competition::find(2);
        return view('peserta.sign-up-web', $data);
    }

    public function showLccRegistrationForm()
    {
        $data['harga_baju'] = Shirt::find(1)->price;
        $data['competition'] = Competition::find(3);
        return view('peserta.sign-up-lcc', $data);
    }

    public function showIdeaRegistrationForm()
    {
        $data['harga_baju'] = Shirt::find(1)->price;
        $data['competition'] = Competition::find(4);
        return view('peserta.sign-up-idea', $data);
    }

    public function showPaaRegistrationForm()
    {
        $data['harga_baju'] = Shirt::find(1)->price;
        $data['competition'] = Competition::find(5);
        return view('peserta.sign-up-paa', $data);
    }
    
}
