<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestAplicadoDetalle extends Model
{
    //
    protected $table = 'test_aplicado_detalle';
    public $timestamps = False;
    
    
    public function test_aplicado(){
        
        return $this->hasOne('App\TestAplicado');
        
    }
}
