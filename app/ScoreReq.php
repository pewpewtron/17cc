<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreReq extends Model
{
	protected $fillable = [
        'file_id',
        'jury_id',
        'status', 
    ];

    public function file()
    {
    	return $this->belongsTo('App\File','file_id');
    }

    public function jury()
    {
    	return $this->belongsTo('App\Jury','jury_id');
    }

    public function scoreList()
    {
    	return $this->hasMany('App\ScoreList');
    }
}
