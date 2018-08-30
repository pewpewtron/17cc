<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use App\Shirt;

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
        if ($this->participants[0]->buy_shirt == 0) {
            return 0;
        }

        if ($this->competition_id == 1 or $this->competition_id == 2) {
            $total = Shirt::find(1)->price;
        }else if($this->competition_id == 3){
            $total = Shirt::find(1)->price*3;
        }else{
            $total = 0;
        }
        // $result = $this->join('participants','participants.group_id','=','groups.id')
        //         ->leftJoin('shirts','shirts.size','=','participants.size')
        //         ->select(DB::raw('sum(IFNULL(shirts.price,0)) as shirt_total'))
        //         ->where('groups.verified','!=',1)
        //         ->orWhereNull('groups.verified')
        //         ->first();

        return $total;
    }

    public function get_captain(){
        return $this->hasMany('App\Participant')->where('captain', "=", "1");
    }

    public function get_regist_cost(){
        return $this->regist_cost;
    }

    public function poster(){
        return $this->hasOne('App\Poster');
    }

    public function videoapk(){
        return $this->hasOne('App\Videoapk');
    }

    public function file(){
        return $this->hasOne('App\File');
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
