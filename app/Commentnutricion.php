<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentnutricion extends Model
{
        protected $table = 'commentnutricion';

     public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
     public function receptor(){
    	return $this->belongsTo('App\User', 'receptor_id');
    }

    public function receta(){
    	return $this->belongsTo('App\Nutricion', 'nutricion_id');
    }

}
