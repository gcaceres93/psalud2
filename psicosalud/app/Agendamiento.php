<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sucursal;
class Agendamiento extends Model
{
    protected $table = 'agendamiento';
    public $timestamps = false;
    
    public function sucursal(){
        return $this->belongsTo('App\Sucursal');
    }
    
    public function modalidad(){
        return $this->belongsTo('App\Modalidad');
    }
    
    public function paciente(){
        return $this->belongsTo('App\Paciente');
    }
    
    public function empleado(){
        return $this->belongsTo('App\Empleado');
    }
}
