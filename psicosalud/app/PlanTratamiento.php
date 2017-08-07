<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanTratamiento extends Model
{
    protected $table = 'plan_tratamiento';
    public $timestamps = false;
    
    public function paciente(){
        return $this->belongsTo('App\Paciente');
    }
    
    public function diagnostico(){
        return $this->belongsTo('App\Diagnostico');
    }
    
    public function tipoTerapia(){
        return $this->belongsTo('App\TipoTerapia');
    }
    
    
}
