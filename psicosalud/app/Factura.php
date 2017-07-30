<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura_cabecera';
    public $timestamps = false;
    //
    
    public function facturadetalle(){
        return $this->belongsToMany('App\FacturaDetalle','usuario_por_rol','usuario_id','rol_id'); 
    }
}
