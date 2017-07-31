<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobro extends Model
{
    
    protected $table = 'cobro';
    
    public $timestamps = false;
    public function factura(){
    return $this->belongsTo('App\Factura');
    
        }
}
