<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    protected $table = 'ejercicios';


   	public function musculo(){
    	return $this->belongsTo('App\Musculo', 'musculo_id');
    }



}
