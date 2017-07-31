<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    protected $table = 'ocupacion';
    public $timestamps = false;
    
    public function persona(){
        return $this->hasMany('App\Persona');
    }
}
