<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFamiliar extends Model
{
    protected $table = 'tipo_familiar';
    public $timestamps = False;
    
    public function personas()
    {
        return $this->belongsToMany('App\Persona','familiar_por_paciente')->withPivot('paciente_id');
    }
    
    public function pacientes()
    {
        return $this->belongsToMany('App\Paciente','familiar_por_paciente')->withPivot('persona_id');
    }
}
