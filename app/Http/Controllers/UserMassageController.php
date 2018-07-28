<?php

namespace App\Http\Controllers;

use App\UserMassage;
use App\UserMessageTemporary;
use Illuminate\Http\Request;
use App\AdminMessageTemporary;
use Auth;
use App\Admin;
use App\Notifications\NotifToInboxAdmin;

class UserMassageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('auth');
    }

    public function index()
    {

        $pesanMasuk = AdminMessageTemporary::where('group_id','=', Auth::user()->id)
            ->orderBy('id','dsc')
            ->get();

        // return $pesanMasuk;

        $jumlahPesan = AdminMessageTemporary::where('group_id','=', Auth::user()->id)
            ->where('view','=', 0)
            ->get();

        // return $jumlahPesan;

        return view('peserta.pesanMasuk', compact('pesanMasuk','jumlahPesan'));
    }

    public function pesanTerkirim()
    {
        $pesanKeluar = UserMassage::where('group_id','=',Auth::user()->id)
            ->get();

        $penerima = Admin::where('competition_id','=',Auth::user()->competition_id)
            ->get();

        $jumlahPesan = AdminMessageTemporary::where('group_id','=', Auth::user()->id)
            ->where('view','=', 0)
            ->get();

        // return $penerima
        return view('peserta.pesanKeluar', compact('pesanKeluar','penerima','jumlahPesan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesan = $this->validate($request, [
            'group_id' => 'required',
            'admin_id' => 'required',
            'subject' => 'required|string|max:255',
            'message' => 'required|string', 
        ],[
            'group_id.required' => 'Kolom tim harus diisi',
            'admin_id.required' => 'Kolom admin harus diisi',
            'subject.required' => 'Kolom subjek harus diisi',
            'message.required' => 'Kolom pesan harus diisi',
        ]);

        $pesan = new UserMassage();
        $pesan->group_id = $request->group_id;
        $pesan->admin_id = $request->admin_id;
        $pesan->subject = $request->subject;
        $pesan->message = $request->message;
        $pesan->save();

        $pesantemp = new UserMessageTemporary();
        $pesantemp->group_id = $request->group_id;
        $pesantemp->admin_id = $request->admin_id;
        $pesantemp->subject = $request->subject;
        $pesantemp->message = $request->message;
        $pesantemp->save();

        Admin::find($request->admin_id)->notify(new NotifToInboxAdmin);
        return redirect('/pesanUserKeluar')->with('success', 'Pesan berhasil terkirim');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserMassage  $userMassage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesan = AdminMessageTemporary::find($id);

        $isiPesan = AdminMessageTemporary::all();

         $jumlahPesan = AdminMessageTemporary::where('group_id','=', Auth::user()->id)
            ->where('view','=', 0)
            ->get();

        // return $isiPesan;

        return view('peserta.lihatPesanMasuk', compact('pesan','isiPesan','jumlahPesan'));
    }

    public function showMsgOut($id)
    {
        $pesan = UserMassage::find($id);

        $isiPesan = UserMassage::all();

        $jumlahPesan = AdminMessageTemporary::where('group_id','=', Auth::user()->id)
            ->where('view','=', 0)
            ->get();

        $penerima = Admin::where('competition_id','=',Auth::user()->competition_id)
            ->get();

        return view('peserta.lihatPesanKeluar', compact('pesan','isiPesan','jumlahPesan','penerima'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserMassage  $userMassage
     * @return \Illuminate\Http\Response
     */
    public function edit(UserMassage $userMassage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserMassage  $userMassage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pesan = AdminMessageTemporary::find($id);

        $pesan->view = $request->view;
        $pesan->save();

        return redirect()->route('pesanUser.show', $pesan->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserMassage  $userMassage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesan = AdminMessageTemporary::find($id);

        if ($pesan) {
            $pesan->delete();
        }

        return redirect('/pesanUser')->with('success', 'Pesan berhasil dihapus');
    }

    public function deletUserMsg($id)
    {
        $pesan = UserMassage::find($id);

        if ($pesan) {
            $pesan->delete();
        }

        return redirect('/pesanUserKeluar')->with('success', 'Pesan berhasil dihapus');
    }
}
