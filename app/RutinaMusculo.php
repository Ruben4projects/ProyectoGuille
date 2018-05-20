<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RutinaMusculo extends Model
{
    protected $table = 'rutinasmusculo';

    public function musculo(){
    	return $this->belongsTo('App\Musculo','musculo_id');
    }

    public function rutina(){
    	return $this->belongsTo('App\Rutina','rutina_id');
    }

    
}
