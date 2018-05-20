<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class likerutina extends Model
{
    protected $table = 'likesrutinas';
    //Relacion de Muchos a uno
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
    
    public function rutina(){
    	return $this->belongsTo('App\Rutina', 'rutina_id');
    }
}
