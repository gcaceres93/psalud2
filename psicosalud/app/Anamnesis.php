<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anamnesis extends Model
{
    protected $table = 'anamnesis';
    public $timestamps = false;
    
    public function paciente(){
        return $this->belongsTo('App\Paciente');
    }
    
    public function consulta(){
        return $this->belongsTo('App\Consulta');
    }
}
