<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model{
    protected $table = 'persona';

    public function paciente()
    {
        return $this->hasOne('Paciente');
    }

}