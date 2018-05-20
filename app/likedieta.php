<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class likedieta extends Model
{
   
    protected $table = 'likesdietas';

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
    
    public function dieta(){
    	return $this->belongsTo('App\Dieta', 'dieta_id');
    }
}
