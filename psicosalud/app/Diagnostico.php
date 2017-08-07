<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table = 'diagnostico';
    public $timestamps = false;
    
    public function anamnesis(){
        return $this->belongsTo('App\Anamnesis');
    }
    
    public function consulta(){
        return $this->belongsTo('App\Consulta');
    }
    
    public function paciente(){
        return $this->belongsTo('App\Paciente');
    }
    
}
