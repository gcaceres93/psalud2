<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarifaHora extends Model
{
    //
    protected $table = 'tarifa_hora';
    public $timestamps = False;
    
    
    public function empleado()
    {
        return $this->belongsTo('App\Empleado');
        
    }
    
    public function modalidad()
    {
        return $this->belongsTo('App\Modalidad');
        
    }
    
}


