<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Validator;
use Redirect;
use Mail;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input as input;
use Illuminate\Support\Facades\Hash;

use App\Dashboard;
use App\Participant;
use App\Verified_req;
use App\File;
use App\Competition;
use App\ScoreReq;
use App\Videoapk;
use App\Poster;
use App\BerkasWeb;
use App\Admin;
use App\Group;
use App\Shirt;
use App\AdminMessageTemporary;
use App\Mail\VerificationUploaded;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    private  $completeness;
    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('auth');
        
        $this->completeness = [
            'email_verif' => 0,
            'participants' => 0,
            'identity_verif' => 0,
            'payment' => 0,
            'payment_verif' => 0,
        ];

        


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $completeness = 0;

        $participants = Auth::user()->participants;

        if(Auth::user()->verified) 
            $this->$completeness['email_verif'] = 1;

        if($participants->count() > 1)
            $this->$completeness['participants'] = 1;
        
        $this->$completeness['identity_verif'] = 1;
        foreach($participants as $participant){
            if(!$participant->active){
                $this->$completeness['identity_verif'] = 0;
            }
        }

        $jumlah = DB::table('participants')
            ->select('participants.id')
            ->where('participants.group_id','=',Auth::user()->id)
            ->get();

        // return $jumlah;
        
        $jumlahPesan = AdminMessageTemporary::where('group_id','=', Auth::user()->id)
            ->where('view','=', 0)
            ->get();
        
            
        $biaya_baju = Shirt::find(1)->price;

        $data['participants'] = Auth::user()->participants;
        return view('peserta.dashboard', $data, compact('jumlah','jumlahPesan','biaya_baju'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peserta.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'full_name' => 'required|string',
            'birthdate' => 'required|date',
            'contact' => 'required|digits_between:1,12|numeric',
            'vegetarian' => 'required',
            'photo' => 'required|max:700|mimes:jpeg,png',
            'email' => 'required|string|email|max:255|unique:groups',
        ],
        [
            'full_name.required' => 'Kolom nama harus diisi',
            'birthday.required' => 'Kolom tanggal lahir harus diisi',
            'email.required' => 'Kolom email harus diisi',
            'contact.required' => 'Kolom kontak harus diisi',
            'vegetarian.required' => 'Kolom vegetarian harus diisi',
            'photo.required' => 'Kolom foto identitas harus diisi',
            'contact.digits' => 'Anda memasukkan nomor terlalu panjang',
            'birthday.date' => 'Masukkan dalam bentuk format tanggal yang benar',
            'contact.numeric' => 'Nomor telepon yang anda masukkan tidak valid',
            'photo.max' => 'Ukuran foto yang diperbolehkan adalah 700kb',
            'photo.mimes' => 'Format foto yang diperbolehkan adalah JPEG dan PNG',
            'email.unique' => 'Email ini sudah digunakan',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ADD NEW PARTICIPANT

        $data = $request->all();
        $this->validator($data)->validate();

        $data['buy_shirt'] = Auth::user()->participants[0]->buy_shirt;
        $data['captain'] = 0;
        $data['group_id'] = Auth::user()->id;
        $data['photo'] = Auth::user()->id."_".$request->full_name.".".$request->file('photo')->getClientOriginalExtension();
        Participant::uploadPhoto($request->file('photo'), $data['photo']);
        Participant::create($data);

        return redirect('dashboard')->with('success', 'Berhasil menambah anggota');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $this->validate($request, [
            'full_name' => 'required|string',
            'birthdate' => 'required|date',
            'contact' => 'required|digits_between:1,12|numeric',
            'vegetarian' => 'required',
            'buy_shirt' => 'required',
            'email' => 'required|string|email|max:255',
            'photo' => 'max:700|mimes:jpeg,png',
        ],[
            'full_name.required' => 'Kolom nama harus diisi',
            'birthday.required' => 'Kolom tanggal lahir harus diisi',
            'email.required' => 'Kolom email harus diisi',
            'contact.required' => 'Kolom kontak harus diisi',
            'vegetarian.required' => 'Kolom vegetarian harus diisi',
            'contact.digits' => 'Anda memasukkan nomor terlalu panjang',
            'birthday.date' => 'Masukkan dalam bentuk format tanggal yang benar',
            'contact.numeric' => 'Nomor telepon yang anda masukkan tidak valid',
            'photo.max' => 'Ukuran foto yang diperbolehkan adalah 700kb',
            'photo.mimes' => 'Format foto yang diperbolehkan adalah JPEG dan PNG',
        ]);


        $participant =  Participant::find($id);
        $group = Group::find($participant->group_id);
        
        $participant->full_name = $request->full_name;
        $participant->birthdate = $request->birthdate;
        $participant->email = $request->email;
        $participant->contact = $request->contact;
        $participant->vegetarian = $request->vegetarian;
        if ($group->participants[0]->id == $participant->id) {
            Participant::where('group_id', $group->id)
                ->update(['buy_shirt' => $request->buy_shirt]);
        }
        
        $participant->size = ($participant->buy_shirt==0) ? null : $request->size;
        if($request->file('photo') != null){
            $photo = Auth::user()->competition_id."_".$request->full_name.".".$request->file('photo')->getClientOriginalExtension();
            try{
                Participant::uploadPhoto($request->file('photo'), $photo);
                $participant->photo = $photo;
            } catch(Exception $e) {
                $msgs['error'] = "Gagal upload gambar!";
            }
        }
        $msgs['success'] = 'Berhasil mengubah data anggota';
        $participant->save();

        return redirect('dashboard')->with($msgs);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Participant::destroy($id);
        return redirect('dashboard')->with('success', 'Berhasil menghapus data anggota');
    }

    public function showVerificationForm()
    {
        if (Auth::user()->competition_id == 3 or Auth::user()->competition_id == 4 or Auth::user()->competition_id == 5) {
            if (count(Auth::user()->participants) < 2) {
                return redirect('/dashboard')->with('warning', 'Input Data Tim Anda sebelum masuk ke menu Upload Bukti Pembayaran');
            }
        }

        if (Auth::user()->verified_email!=1) {
            return redirect('dashboard')->with('warning', 'Mohon melakukan verifikasi email terlebih dahulu!');
        }

        $jumlahPesan = AdminMessageTemporary::where('group_id','=', Auth::user()->id)
            ->where('view','=', 0)
            ->get();
        
        $biaya_pendaftaran = Auth::user()->get_regist_cost();
        $biaya_baju = Auth::user()->get_shirts_cost();
        $dir = Verified_req::$dir_verifikasi;

        return view('peserta.verifikasi', compact('jumlahPesan', 'biaya_baju', 'biaya_pendaftaran', 'dir'));
    }

    public function showUploadDataForm()
    {
        
        if (Auth::user()->verified_email!=1) {
            return redirect('dashboard')->with('warning', 'Mohon melakukan verifikasi email terlebih dahulu!');
        }

        if (Auth::user()->verified != 1) {
            return redirect('dashboard')->with('warning', 'Mohon maaf, Anda belum menjadi Peserta san. Unggah bukti pembayaran anda dan tunggu Panitia untuk melakukan verifikasi.');
        }

        $jumlahPesan = AdminMessageTemporary::where('group_id','=', Auth::user()->id)
            ->where('view','=', 0)
            ->get();
        
        return view('peserta.upload', compact('jumlahPesan'));
    }

    public function showUploadPosterForm(){
        if (Auth::user()->competition_id != 4) {
            return redirect('dashboard');
        }

        if (Auth::user()->verified_email!=1) {
            return redirect('dashboard')->with('warning', 'Mohon melakukan verifikasi email terlebih dahulu!');
        }

        if (Auth::user()->verified != 1) {
            return redirect('dashboard')->with('warning', 'Mohon maaf, Anda belum menjadi Peserta sah. Unggah bukti pembayaran anda dan tunggu Panitia untuk melakukan verifikasi.');
        }

        if (Auth::user()->file == null) {
            return redirect('dashboard')->with('warning', 'Unggah proposal terlebih dahulu sebelum mengunggah Poster');
        }

        $jumlahPesan = AdminMessageTemporary::where('group_id','=', Auth::user()->id)
            ->where('view','=', 0)
            ->get();
        $dir = Poster::$dir;
        return view('peserta.uploadPoster', compact('jumlahPesan', 'dir'));
    }

    public function uploadPoster(Request $request){
        $this->validate($request, [
            'file' => 'required|max:700|mimes:jpeg,png',
        ]);

        $file = Auth::user()->poster;
        if($file != null){
            $file->delete();
        }

        $data = $request->all();
        $data['group_id'] = Auth::user()->id;
        $data['file'] = "poster_".Auth::user()->file->title.".".$request->file('file')->getClientOriginalExtension();
        Poster::upload($request->file('file'), $data['file']);
        Poster::create($data);

        return Redirect::back()->with('success', 'Berhasil upload verifikasi!');
    }

    public function showUploadVideoAPKForm(){

        
        if (Auth::user()->competition_id != 5) {
            return redirect('dashboard');
        }

        if (Auth::user()->verified_email!=1) {
            return redirect('dashboard')->with('warning', 'Mohon melakukan verifikasi email terlebih dahulu!');
        }

        if (Auth::user()->verified != 1) {
            return redirect('dashboard')->with('warning', 'Mohon maaf, Anda belum menjadi Peserta san. Unggah bukti pembayaran anda dan tunggu Panitia untuk melakukan verifikasi.');
        }


        $jumlahPesan = AdminMessageTemporary::where('group_id','=', Auth::user()->id)
            ->where('view','=', 0)
            ->get();
        
        return view('peserta.uploadVideoAPK', compact('jumlahPesan'));
    }

    public function uploadVideoAPK(Request $request){
        $this->validate($request, [
            'link' => 'required',
        ]);

        $otherFileExist = Auth::user()->videoapk;
        if($otherFileExist != null){
            $otherFileExist->delete();
        }

        $data = $request->all();
        $data['group_id'] = Auth::user()->id;
        $link = Videoapk::create($data);

        return redirect('/uploadVideoAPK')->with('success', 'Berhasil upload tautan!');
    }

    public function showUploadBerkasForm()
    {
        if (Auth::user()->competition_id != 2) {
            return redirect('dashboard');
        }

        if (Auth::user()->verified_email!=1) {
            return redirect('dashboard')->with('warning', 'Mohon melakukan verifikasi email terlebih dahulu!');
        }

        if (Auth::user()->verified != 1) {
            return redirect('dashboard')->with('warning', 'Mohon maaf, Anda belum menjadi Peserta san. Unggah bukti pembayaran anda dan tunggu Panitia untuk melakukan verifikasi.');
        }


        $jumlahPesan = AdminMessageTemporary::where('group_id','=', Auth::user()->id)
            ->where('view','=', 0)
            ->get();
        
        return view('peserta.uploadBerkasWeb', compact('jumlahPesan'));
    }

    public function uploadBerkasWeb(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|max:1000|mimes:rar,zip',
        ]);

        $file = Auth::user()->berkasWeb;
        if($file != null){
            $file->delete();
        }

        $data = $request->all();
        $data['group_id'] = Auth::user()->id;
        $data['file'] = "bahan_web_".Auth::user()->id."_".Auth::user()->group_name.".".$request->file('file')->getClientOriginalExtension();
        BerkasWeb::upload($request->file('file'), $data['file']);
        BerkasWeb::create($data);

        return Redirect::back()->with('success', 'Berhasil upload berkas web!');
    }

    public function showSettingForm()
    {
        $jumlahPesan = AdminMessageTemporary::where('group_id','=', Auth::user()->id)
            ->where('view','=', 0)
            ->get();

        return view('peserta.setting', compact('jumlahPesan'));
    }

    public function gantiPassword()
    {
        $Group = Group::find(Auth::user()->id);
        if (Hash::check(Input::get('passwordold'), $Group['password']) && Input::get('password') == Input::get('password_confirmation')) {
            $Group->password = bcrypt(Input::get('password'));
            $Group->save();
            return back()->with('success', 'Password berhasil diganti');
        }else{
            return back()->with('error', 'Gagal mengganti password');
        }
    }
    
    public function uploadVerification(Request $request){

        $this->validate($request, [
            'photo' => 'required|max:700|mimes:jpeg,png',
        ]);

        $file = Auth::user()->verif;
        if($file != null){
            $file->delete();
        }

        $data = $request->all();
        $data['group_id'] = Auth::user()->id;
        $data['request_at'] = Carbon::now();
        $data['filename'] = "verif_".Auth::user()->id.".".$request->file('photo')->getClientOriginalExtension();
        Verified_req::uploadVerification($request->file('photo'), $data['filename']);
        $verification = Verified_req::create($data);

        $comp_id = Auth::user()->competition_id;
        $admins = Admin::where('competition_id', $comp_id)->get()->pluck('email')->toArray();
        $email = new VerificationUploaded($verification);

        Mail::to($admins)->send($email);

        return Redirect::back()->with('success', 'Berhasil upload verifikasi!');
    }

    public function uploadData(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'file' => 'required|mimes:pdf',
        ]);

        $otherFileExist = Auth::user()->file;
        if($otherFileExist != null){
            $otherFileExist->delete();
        }

        $data = $request->all();
        $data['group_id'] = Auth::user()->id;
        $data['link'] = "berkas_".Auth::user()->id.".".$request->file('file')->getClientOriginalExtension();
        $data['status'] = "N";
        File::upload($request->file('file'), $data['link']);
        $file = File::create($data);

        //if Ide bisnis/ SI
        if(Auth::user()->competition_id == 4){
            $competition = Competition::find(Auth::user()->competition_id);

            foreach ($competition->juri as $juri) {
                $data['status'] = '0';
                $data['file_id'] = $file->id;
                $data['jury_id'] = $juri->id;
                ScoreReq::create($data);
            }
        }


        return redirect('/upload')->with('success', 'Berhasil upload proposal!');
    }
}
