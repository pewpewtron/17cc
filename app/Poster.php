<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    public static $dir = "uploads/poster";

	protected $fillable = [
        'group_id',
        'file',
    ];

    public static function upload($file, $file_name){
        $destinationPath = public_path(self::$dir);
        $file->move($destinationPath, $file_name);
    }
}
