<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AplicarTest extends Model
{
    //
    protected $table = 'test_aplicado';
    public $timestamps = False;
    
    
    public function detalle(){
            
        return $this->hasMany('App\TestAplicadoDetalle','test_aplicado_id'); 
        
    }
    
    
}
