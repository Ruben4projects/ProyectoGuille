<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
  protected $table = 'dietas';

  public function comments(){
    	return $this->hasMany('App\Commentdieta')->orderBy('id','desc');
    }
//Relacion uno a uno hasone
    //Relacion de Muchos a uno
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
}
