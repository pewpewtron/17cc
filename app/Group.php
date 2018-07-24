<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Group extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_name',
        'institution', 
        'username', 
        'password',
        'email',
        'competition_id',
        'email_token',
        'regist_cost'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function get_shirts_cost(){
        $result = $this->join('participants','participants.group_id','=','groups.id')
                ->leftJoin('shirts','shirts.size','=','participants.size')
                ->select(DB::raw('sum(IFNULL(shirts.price,0)) as shirt_total'))
                ->where('groups.verified','!=',1)
                ->orWhereNull('groups.verified')
                ->first();

        return $result->shirt_total;
    }

    public function get_regist_cost(){
        return $this->competition->regist_cost;
    }

    public function file(){
        return $this->hasMany('App\File');
    }

    public function participants(){
        return $this->hasMany('App\Participant');
    }

    public function competition(){
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

    public function verif()
    {
        return $this->hasOne('App\Verified_req')->latest();
    }
}
