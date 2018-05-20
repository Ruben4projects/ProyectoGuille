<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentdieta extends Model
{
    protected $table = 'commentdietas';

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
     public function receptor(){
    	return $this->belongsTo('App\User', 'receptor_id');
    }

    public function dieta(){
    	return $this->belongsTo('App\Dieta', 'dieta_id');
    }
}
