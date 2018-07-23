<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailScoreList extends Model
{
    protected $fillable = [
        'score_list_id',
        'part',
        'score', 
    ];

    public function scoreList(){
    	return $this->belongsTo('App\ScoreList', 'score_list_id');
    }
}
