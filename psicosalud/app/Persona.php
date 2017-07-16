<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model{
    protected $table = 'personas';

    public function ocupacion(){
    	return $this->belongsTo('App\Ocupacion');
    }

}