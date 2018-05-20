<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nutricion extends Model
{
    protected $table = 'nutricion';

    public function comments(){
    	return $this->hasMany('App\Commentnutricion')->orderBy('id','desc');
    }
//Relacion uno a uno hasone
    //Relacion de Muchos a uno
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
}
