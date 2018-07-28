<?php

namespace App\Http\Controllers;

use App\ScoreList;
use Illuminate\Http\Request;
use Auth;
use App\Group;
use App\File;
use App\Participant;
use DB;
use App\DetailScoreList;
use App\ScoreReq;

class ScoreListController extends Controller
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
        //
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
        
        $score = new ScoreList();
        $score->score_req_id = $request->score_req_id;
        $score->stage = $request->stage;
        $score->save();

        foreach ($request->form as $key => $part_id) {
            $score_list = new DetailScoreList();
            $score_list->score_list_id = $score->id;
            $score_list->part = $part_id;
            $score_list->score = $request->score[$key];
            $score_list->save();
        }

        return redirect('/juri');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ScoreList  $scoreList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $score = ScoreReq::find($id);
        $karya = File::with('group')->get();
        $group = Group::all();

        // return $karya;

        $today = date('Y-m-d');

        $final = date('2018-05-06');

        //return $today;

        //return $today;

        if (Auth::user()->competition_id==4) {
            return view('jury.form', compact('today','final','score','karya','tim'));
        }elseif (Auth::user()->competition_id==5) {
            return view('jury.form-nilai-si', compact('today','final','score','karya','tim'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ScoreList  $scoreList
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataSecore = ScoreList::find($id);
        /*$group = Group::all();
        $object = Object::with('group');*/
        $scoreReq = ScoreReq::all();
        $scores = ScoreList::with('scoreReq')->get();

        //return $scores;

        $score = DetailScoreList::with('scoreList')->where('score_list_id','=', $id)->get();

        //return $scores;

        // $group_id = DB::table('objects')
        //     ->select('objects.group_id');

        /*$id_group = Object::find($id);
        $scoreList = ScoreList::with('object')
            ->get();
        
        $participant = Participant::with('group')
            ->where('group_id','=',$id)
            ->get();*/

        if (Auth::user()->competition_id==4) {
            return view('jury.form-edit-nilai', compact('dataSecore','scores','score','scoreReq'));
        }elseif (Auth::user()->competition_id==5) {
            return 'aaaa';
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ScoreList  $scoreList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $scores = DetailScoreList::
            where('score_list_id','=',$id)
            ->get();

        $dataSecore = ScoreList::find($id);

        $dataSecore->score_req_id = $request->score_req_id;
        $dataSecore->save();

        foreach ($scores as $key => $score) {
            $score_list = DetailScoreList::find($score->id);
            $score_list->score = $request->score[$key];
            $score_list->save();
        }

        return redirect('/juri');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ScoreList  $scoreList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
