<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = "consulta";
    public $timestamps = false;
    
    public function agendamiento(){
        return $this->belongsTo('App\Agendamiento');
    }
    
    public function paciente(){
        return $this->belongsTo('App\Paciente');
    }
    
}
