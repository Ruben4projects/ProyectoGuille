<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class likenutricion extends Model
{
    protected $table = 'likesnutricion';

     public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
   
    public function receta(){
    	return $this->belongsTo('App\Nutricion', 'nutricion_id');
    }
}
