<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    public static $dir_file = "uploads/berkas";

    protected $fillable = [
        'group_id',
        'title',
        'link',
        'etc',
        'status', 
    ];

    public function group(){
        return $this->belongsTo('App\Group','group_id');
    }

    public function scoreReq(){
    	return $this->hasMany('App\ScoreReq');
    }

    public static function upload($file, $file_name){
        $destinationPath = public_path(self::$dir_file);
        $file->move($destinationPath, $file_name);
    }
}
