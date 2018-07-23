<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreList extends Model
{
    protected $fillable = [
        'score_list_id',
        'stage', 
    ];

    public function scoreReq(){
    	return $this->belongsTo('App\ScoreReq', 'score_req_id');
    }

    public function detailScore(){
    	return $this->hasMany('App\DetailScoreList');
    }
}
