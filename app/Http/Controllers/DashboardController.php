<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dashboard;
use App\Participant;
use App\Verified_req;
use App\File;
use App\Competition;
use App\ScoreReq;
use Auth;
use DB;
use App\AdminMessageTemporary;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input as input;
use Illuminate\Support\Facades\Hash;
use App\Group;
use App\Shirt;

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
        if($data['buy_shirt']==0){
            $data['size'] = null;
        }
        $data['captain'] = 0;
        $data['group_id'] = Auth::user()->id;
        $data['photo'] = $request->competition_id."_".$request->full_name.".".$request->file('photo')->getClientOriginalExtension();
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
        $participant =  Participant::find($id);
        $participant->full_name = $request->full_name;
        $participant->birthdate = $request->birthdate;
        $participant->email = $request->email;
        $participant->contact = $request->contact;
        $participant->vegetarian = $request->vegetarian;
        $participant->buy_shirt = $request->buy_shirt;
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
        if (Auth::user()->verified_email!=1) {
            return redirect('dashboard')->with('warning', 'Mohon melakukan verifikasi email terlebih dahulu!');
        }

        $jumlahPesan = AdminMessageTemporary::where('group_id','=', Auth::user()->id)
            ->where('view','=', 0)
            ->get();
        
        $biaya_pendaftaran = Auth::user()->get_regist_cost();
        $biaya_baju = Auth::user()->get_shirts_cost();

        return view('peserta.verifikasi', compact('jumlahPesan', 'biaya_baju', 'biaya_pendaftaran'));
    }

    public function showUploadDataForm()
    {
        
        if (Auth::user()->verified_email!=1) {
            return redirect('dashboard')->with('warning', 'Mohon melakukan verifikasi email terlebih dahulu!');
        }

        $jumlahPesan = AdminMessageTemporary::where('group_id','=', Auth::user()->id)
            ->where('view','=', 0)
            ->get();

        return view('peserta.upload', compact('jumlahPesan'));
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
        $file = Auth::user()->verif;
        if($file != null){
            $file->delete();
        }

        $data = $request->all();
        $data['group_id'] = Auth::user()->id;
        $data['request_at'] = Carbon::now();
        $data['filename'] = "verif_".Auth::user()->id.".".$request->file('photo')->getClientOriginalExtension();
        Verified_req::uploadVerification($request->file('photo'), $data['filename']);
        Verified_req::create($data);

        return redirect('dashboard')->with('success', 'Berhasil upload verifikasi!');
    }

    public function uploadData(Request $request){
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


        return redirect('dashboard')->with('success', 'Berhasil upload verifikasi!');
    }
}
