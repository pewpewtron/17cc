<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMessageTemporary extends Model
{
    protected $fillable = [
        'group_id',
        'admin_id',
        'subject',
        'message',
        'view',
        'created_at', 
    ];

    public function group()
    {
    	return $this->belongsTo('App\Group','group_id');
    }

    public function admin()
    {
    	return $this->belongsTo('App\Admin','admin_id');
    }
}
