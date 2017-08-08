<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultadoTest extends Model
{
    //
    protected $table = 'resultado_por_test';
    public $timestamps = false;
    
    public function test_r()
    {
        return $this->belongsTo('App\Test');
    }
    
    
    
  
    
    
    
}
