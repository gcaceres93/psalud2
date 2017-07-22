<?php


namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PacienteFamiliar extends Pivot
{
    public function paciente(){
        return $this->belongsTo('App\Paciente');
    }
    
    public function persona(){
        return $this->belongsTo('App\Persona');
    }
    
    public function tipoFamiliar(){
        return $this->belongsTo('App\TipoFamiliar','id','id');
    }
    
    
}