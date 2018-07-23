<?php

namespace App\Http\Controllers;

use App\AdminMassage;
use Illuminate\Http\Request;
use App\UserMessageTemporary;
use Auth;
use App\AdminMessageTemporary;
use App\Group;
use App\Notifications\NotifToInboxGroup;

class AdminMassageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $pesan = UserMessageTemporary::where('admin_id','=',Auth::user()->id)
            ->orderBy('id','dsc')
            ->get();

        $jumlahPesan = UserMessageTemporary::where('admin_id','=',Auth::user()->id)
            ->where('view','=',0)
            ->get();

        // return $pesan;

        // return $jumlahPesan;

        return view('admin.pesanMasuk', compact('pesan','jumlahPesan'));
    }

    public function showMsgOut()
    {
        $pesan = AdminMassage::where('admin_id','=',Auth::user()->id)
            ->orderBy('id','dsc')
            ->get();

        $jumlahPesan = UserMessageTemporary::where('admin_id','=',Auth::user()->id)
            ->where('view','=',0)
            ->get();

        $penerima = Group::where('competition_id','=', Auth::user()->competition_id)
            ->get();

        return view('admin.pesanKeluar', compact('pesan','jumlahPesan','penerima'));
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

        $pesan = new AdminMassage();
        $pesan->group_id = $request->group_id;
        $pesan->admin_id = $request->admin_id;
        $pesan->subject = $request->subject;
        $pesan->message = $request->message;
        $pesan->save();

        $pesantmp = new AdminMessageTemporary();
        $pesantmp->group_id = $request->group_id;
        $pesantmp->admin_id = $request->admin_id;
        $pesantmp->subject = $request->subject;
        $pesantmp->message = $request->message;
        $pesantmp->save();

        // return 'a';
        Group::find($request->group_id)->notify(new NotifToInboxGroup);
        return redirect('/pesanAdminKeluar')->with('success', 'Pesan berhasil terkirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminMassage  $adminMassage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesan = UserMessageTemporary::find($id);

        $isiPesan = UserMessageTemporary::all();

        $jumlahPesan = UserMessageTemporary::where('admin_id','=',Auth::user()->id)
            ->where('view','=',0)
            ->get();

        return view('admin.lihatPesanMasuk', compact('pesan','isiPesan','jumlahPesan'));
    }

    public function msgOutShow($id)
    {
        $pesan = AdminMassage::find($id);

        $isiPesan = AdminMassage::all();

        $penerima = Group::where('competition_id','=',Auth::user()->competition_id)
            ->get();

        $jumlahPesan = UserMessageTemporary::where('admin_id','=',Auth::user()->id)
            ->where('view','=',0)
            ->get();

        return view('admin.lihatPesanKeluar', compact('pesan','isiPesan','penerima','jumlahPesan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminMassage  $adminMassage
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminMassage $adminMassage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminMassage  $adminMassage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pesan = UserMessageTemporary::find($id);

        $pesan->view = $request->view;
        $pesan->save();

        // return 'a';
        return redirect()->route('pesanAdmin.show', $pesan->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminMassage  $adminMassage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesan = UserMessageTemporary::find($id);

        if ($pesan) {
            $pesan->delete();
        }

        return redirect('/pesanAdmin')->with('success', 'Pesan berhasil dihapus');
    }

    public function deleteMsg($id)
    {
        $pesan = AdminMassage::find($id);

        if ($pesan) {
            $pesan->delete();
        }

        return redirect('/pesanAdminKeluar')->with('success', 'Pesan berhasil dihapus');
    }
}
