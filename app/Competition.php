<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'short_name',
        'long_name',
        'regist_cost',
        'description', 
    ];

    public function group(){
        return $this->hasMany('App\Group');
    }

    public function juri()
    {
    	return $this->hasMany('App\Jury');
    }

    public function admin()
    {
        return $this->hasMany('App\Admin');
    }
}
