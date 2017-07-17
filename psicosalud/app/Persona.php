<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

    protected $table = 'persona';
    public $timestamps = false;

    public function paciente()
    {
    	
        return $this->hasOne('App\Paciente');
    }

    public function empleado()
    {
        return $this->hasOne('Empleado');
    }

}