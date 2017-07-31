<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    public $table = 'factura_cabecera';
    public $timestamps = false;
    public $attributes;
//     public $items;
//     public $primaryKey;
//     public $original;
    //
    
    public function facturadetalle(){
        return $this->hasMany('App\FacturaDetalle','factura_cabecera_id'); 
        
    }
    public function cobro(){
        return $this->hasOne('App\Cobro','factura_id');
        
    }
}
