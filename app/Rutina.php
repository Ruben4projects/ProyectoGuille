<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    protected $table = 'rutinas';

    public function comments(){
    	return $this->hasMany('App\Commentrutina')->orderBy('id','desc');
    }

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
}
