<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaDetalle extends Model
{
    protected $table = 'factura_detalle';
    public $timestamps = false;
    
    
    public function factura(){
        return $this->belongsTo('App\Factura');
    }
}
