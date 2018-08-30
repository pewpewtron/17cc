<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Competition;

class Participant extends Model
{
    public static $dir_photo = "/uploads/identitas/";

    protected $fillable = [
        'group_id',
        'code',
        'full_name', 
        'birthdate', 
        'email',
        'contact',
        'photo',
        'vegetarian',
        'buy_shirt',
        'size',
        'captain'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

        /**
     * Get the group that owns the participant.
     */
    public function group(){
        return $this->belongsTo('App\Group', 'group_id');
    }

    public static function uploadPhoto($file, $file_name){
        $destinationPath = public_path(Participant::$dir_photo);
        return $file->move($destinationPath, $file_name);
    }

    public function generate_code(){
        $competition = Competition::find($this->group->competition_id);

        $code = strtoupper($competition->short_name) . "_";

        $last_code = Participant::where('code','LIKE',$code."%")->orderBy('code','desc')->first();

        if($last_code == null) {
            $code .= "01";
        } else {
            $num = (int) substr($last_code->code,-2);
            $num++;
            $code .= sprintf('%02d',$num);
        }

        return $code;
    }
}
