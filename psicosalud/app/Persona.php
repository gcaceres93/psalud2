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
        return $this->hasOne('app\Empleado');
    }
    
    public function ocupacion()
    {
        return $this->belongsTo('App\Ocupacion');
    }
    
    public function pacientes()
    {
        return $this->belongsToMany('App\Paciente','familiar_por_paciente')->withPivot('tipo_familiar_id');
    }
    
    public function tipoFamiliares()
    {
        return $this->belongsToMany('App\TipoFamiliar','familiar_por_paciente')->withPivot('paciente_id');
    }

}