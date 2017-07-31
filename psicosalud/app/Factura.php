<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = 'factura_cabecera';
    public $timestamps = false;
    //
    
    public function facturadetalle(){
        return $this->hasMany('App\FacturaDetalle','factura_cabecera_id'); 
        
    }
}
