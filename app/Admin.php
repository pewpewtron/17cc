<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'competition_id', 'privilege', 'username', 'password', 'email', 'is_login', 'last_login_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function competition()
    {
        return $this->belongsTo('App\Competition','competition_id');
    }

    public function adminMassage()
    {
        return $this->hasMany('App\AdminMassage');
    }

    public function adminMessageTemporary()
    {
        return $this->hasMany('App\AdminMessageTemporary');
    }

    public function userMassage()
    {
        return $this->hasMany('App\UserMassage');
    }

    public function userMessageTemporary()
    {
        return $this->hasMany('App\UserMessageTemporary');
    }
}
