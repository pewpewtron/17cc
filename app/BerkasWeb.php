<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BerkasWeb extends Model
{
    public static $dir = "uploads/berkas_web";

    protected $fillable = [
        'group_id',
        'file',
        'etc',
    ];

    public static function upload($file, $file_name){
        $destinationPath = public_path(self::$dir);
        $file->move($destinationPath, $file_name);
    }
}
