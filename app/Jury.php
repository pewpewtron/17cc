<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Jury extends Authenticatable
{
    use Notifiable;

    protected $guard = 'jury';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'privilege', 'username', 'password', 'email', 'is_login', 'last_login_at', 'competition_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function scoreReq(){
        return $this->hasMany('App\ScoreReq');
    }

    public function competition(){
        return $this->belongsTo('App\Competition', 'competition_id');
    }
}
