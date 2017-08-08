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
        return $this->hasMany('App\PreguntaTest','pregunta_por_test')->withPivot('test_id');
    }
    
    public function resultado()
    {
        return $this->hasMany('App\ResultadoTest','resultado_por_test')->withPivot('test_id');
    }
}
