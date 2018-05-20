<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentrutina extends Model
{
	protected $table = 'commentrutinas';
    //Relacion de Muchos a uno
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
    public function receptor(){
    	return $this->belongsTo('App\User', 'receptor_id');
    }

    public function rutina(){
    	return $this->belongsTo('App\Rutina', 'rutina_id');
    }


}
