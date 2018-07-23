<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table="peserta";
    protected $primaryKey="id";
    protected $fillable=['nama_tim','asal'];
}
