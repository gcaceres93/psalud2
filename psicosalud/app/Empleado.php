<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Empleado extends Model
{
     protected $table = 'empleado';
     public $timestamps = false;

     public function persona()
    {
        
        return $this->belongsTo('App\Persona');
    }

    public function cargo()
    {
    	return $this->belongsTo('App\Cargo');
    }
}
