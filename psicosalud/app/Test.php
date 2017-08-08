<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    protected $table = 'test';
    public $timestamps = false;
    
    
    public function pregunta()
    {
        return $this->hasMany('App\PreguntaTest','test_id');
    }
    
    public function resultado()
    {
        return $this->hasMany('App\ResultadoTest','test_id');
    }
}
