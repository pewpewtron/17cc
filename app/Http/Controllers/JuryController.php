<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\File;
use Auth;
use DB;
use App\DetailScoreList;
use App\Jury;
use Carbon\Carbon;
use App\ScoreList;
use App\ScoreReq;
class JuryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:jury');
    }
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = date('Y-m-d');

        $final = date('2018-05-10');

        $pesan = DB::table('score_reqs')
            ->select('score_reqs.id')
            ->where('score_reqs.jury_id','=',Auth::user()->id)
            ->where('score_reqs.status','=',1)
            ->get();

        if ($today==$final) {
            $group = DB::table('groups')
                ->join('files', 'groups.id','=','files.group_id')
                ->join('score_reqs','files.id','=','score_reqs.file_id')
                ->join('juries','juries.id','=','score_reqs.jury_id')
                ->join('score_lists','score_reqs.id','=','score_lists.score_req_id')
                ->join('detail_score_lists','score_lists.id','=','detail_score_lists.score_list_id')
                ->select('groups.institution', 'groups.group_name', 'files.title', 'files.id',DB::raw('sum(detail_score_lists.score) as total_nilai'), 'score_lists.id as id_score', 'score_lists.score_req_id')
                ->where('groups.competition_id','=', Auth::user()->competition_id)
                ->where('score_reqs.jury_id','=',Auth::user()->id)
                ->where('score_lists.stage','=','final')
                ->groupBy('files.title', 'groups.group_name','groups.institution','files.id', 'id_score','score_lists.score_req_id')
                ->orderBy('total_nilai','dsc')
                ->get();

                return view('jury.dashboard', compact('pesan','group'));
        }else{
            $group = DB::table('groups')
                ->join('files', 'groups.id','=','files.group_id')
                ->join('score_reqs','files.id','=','score_reqs.file_id')
                ->join('juries','juries.id','=','score_reqs.jury_id')
                ->join('score_lists','score_reqs.id','=','score_lists.score_req_id')
                ->join('detail_score_lists','score_lists.id','=','detail_score_lists.score_list_id')
                ->select('groups.institution', 'groups.group_name', 'files.title', 'files.id',DB::raw('sum(detail_score_lists.score) as total_nilai'), 'score_lists.id as id_score', 'score_lists.score_req_id')
                ->where('groups.competition_id','=', Auth::user()->competition_id)
                ->where('score_reqs.jury_id','=',Auth::user()->id)
                ->groupBy('files.title', 'groups.group_name','groups.institution','files.id', 'id_score','score_lists.score_req_id')
                ->orderBy('total_nilai','dsc')
                ->get();

                return view('jury.dashboard', compact('pesan','group'));
        }
        //return $group;

        //return $juri_id;
           
    }

    public function showRekapNilai()
    {
        $group = DB::table('groups')
            ->join('files', 'groups.id','=','files.group_id')
            ->join('score_reqs','files.id','=','score_reqs.file_id')
            ->join('juries','juries.id','=','score_reqs.jury_id')
            ->join('score_lists','score_reqs.id','=','score_lists.score_req_id')
            ->join('detail_score_lists','score_lists.id','=','detail_score_lists.score_list_id')
            ->select('groups.institution', 'groups.group_name', 'files.title', 'files.id',DB::raw('sum(detail_score_lists.score) as total_nilai'), 'score_lists.id as id_score', 'score_lists.score_req_id')
            ->where('groups.competition_id','=', Auth::user()->competition_id)
            ->where('score_reqs.jury_id','=',Auth::user()->id)
            ->groupBy('files.title', 'groups.group_name','groups.institution','files.id', 'id_score','score_lists.score_req_id')
            //->orderBy('total_nilai','dsc')
            ->get();

        // return $group;

        $penilaian = DB::table('score_reqs')
            ->select('score_reqs.id')
            //->where('score_reqs.status','=',1)
            ->get();

        // return count($penilaian)*2;

        $juri = Auth::user()->id;

        // return $juri;

        // $nilai = DB::select('call detail_score_ulang(?,?)',[count($penilaian)*2,$juri]);

        // return $nilai;

        $pesan = DB::table('score_reqs')
            ->select('score_reqs.id')
            ->where('score_reqs.jury_id','=',Auth::user()->id)
            ->where('score_reqs.status','=',1)
            ->get();

        return view('jury.rekap-nilai', compact('pesan','group'));
    }

    public function showFormDetailRekap()
    {
        $pesan = DB::table('score_reqs')
            ->select('score_reqs.id')
            ->where('score_reqs.jury_id','=',Auth::user()->id)
            ->where('score_reqs.status','=',1)
            ->get();

        $today = date('Y-m-d');

        $final = date('2018-05-10');

        $juri = DB::table('juries')
            ->select('juries.id as jury_id')
            ->where('juries.competition_id','=',Auth::user()->competition_id)
            ->get();

        // return $juri;

        if ($today==$final) {
            $hasil = DB::table('groups')
                ->join('files','groups.id','=','files.group_id')
                ->join('score_reqs','files.id','=','score_reqs.file_id')
                ->join('score_lists','score_reqs.id','=','score_lists.score_req_id')
                ->join('detail_score_lists','score_lists.id','=','detail_score_lists.score_list_id')
                ->select('groups.institution','groups.group_name','groups.id','files.title','files.id as karya',DB::raw('sum(detail_score_lists.score) as total_nilai'))
                ->where('groups.competition_id','=',Auth::user()->competition_id)
                ->where('score_lists.stage','=','final')
                ->groupBy('groups.id','groups.group_name','groups.institution','files.title','files.id')
                ->orderBy('total_nilai','dsc')
                ->get();

                return view('jury.rekap-nilai-detail',compact('pesan','hasil','juri'));
        }else{
            $hasil = DB::table('groups')
                ->join('files','groups.id','=','files.group_id')
                ->join('score_reqs','files.id','=','score_reqs.file_id')
                ->join('score_lists','score_reqs.id','=','score_lists.score_req_id')
                ->join('detail_score_lists','score_lists.id','=','detail_score_lists.score_list_id')
                ->select('groups.institution','groups.group_name','groups.id','files.title','files.id as karya',DB::raw('sum(detail_score_lists.score) as total_nilai'))
                ->where('groups.competition_id','=',Auth::user()->competition_id)
                ->groupBy('groups.id','groups.group_name','groups.institution','files.title','files.id')
                ->orderBy('total_nilai','dsc')
                ->limit(10)
                ->get();

                return view('jury.rekap-nilai-detail',compact('pesan','hasil','juri'));
        }

    }

    public function showFormSetting()
    {
        $pesan = DB::table('score_reqs')
            ->select('score_reqs.id')
            ->where('score_reqs.jury_id','=',Auth::user()->id)
            ->where('score_reqs.status','=',1)
            ->get();

        return view('jury.setting', compact('pesan'));
    }

    public function updateJuri(Request $request, $id)
    {
        $juri = $this->validate($request, [
            'username' => 'required',
            'password' => 'required|confirmed',
        ],[
            'username.required' => 'Kolom username harus diisi',
            'password.required' => 'Kolom password harus diisi',
            'password.confirmed' => 'Konfirmasi password tidak sesuai',
        ]);

        $juri = Jury::find($id);
        $juri->username = $request->username;
        $juri->password = bcrypt($request->password);
        $juri->save();

        return redirect('/juri')->with('success', 'Data autentikasi berhasil diperbarui');
    }

    public function showFormDinamis()
    {
        return view('jury/form-dinamis-manipulation');
    }

}
