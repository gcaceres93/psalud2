<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestDiagnostico extends Model
{
    //
    protected $table = 'test_por_diagnostico';
    public $timestamps = False;
    
    public function diagnostico(){
        
        return $this->hasOne('App\Diagnostico');
        
    }
}
