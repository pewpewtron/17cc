<?php

namespace App\Http\Controllers;

use App\ScoreReq;
use Illuminate\Http\Request;
use Auth;
use DB;

class ScoreReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:jury');
    }


    public function index()
    {
        $groups = DB::table('groups')
            ->join('files','groups.id','=','files.group_id')
            ->join('score_reqs','files.id','=','score_reqs.file_id')
            ->join('juries','juries.id','=','score_reqs.jury_id')
            ->select('groups.institution','groups.group_name','files.title','score_reqs.status','score_reqs.id','score_reqs.file_id','score_reqs.jury_id')
            ->where('juries.id','=',Auth::user()->id)
            ->where('score_reqs.status','=',1)
            ->get();

        $pesan = DB::table('score_reqs')
            ->select('score_reqs.id')
            ->where('score_reqs.jury_id','=',Auth::user()->id)
            ->where('score_reqs.status','=',1)
            ->get();
        //return $groups;
        // return $pesan;

        return view('jury.score-req', compact('groups','pesan'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ScoreReq  $scoreReq
     * @return \Illuminate\Http\Response
     */
    public function show(ScoreReq $scoreReq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ScoreReq  $scoreReq
     * @return \Illuminate\Http\Response
     */
    public function edit(ScoreReq $scoreReq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ScoreReq  $scoreReq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $score = ScoreReq::find($id);

        $score->file_id = $request->file_id;
        $score->jury_id = $request->jury_id;
        $score->status = $request->status;
        $score->save();

        return redirect()->route('form-nilai.show', $score->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ScoreReq  $scoreReq
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScoreReq $scoreReq)
    {
        //
    }
}
