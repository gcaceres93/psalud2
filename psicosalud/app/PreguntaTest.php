<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaTest extends Model
{
    //
    protected $table = 'pregunta_por_test';
    public $timestamps = false;
    
    
    public function test()
    {
        return $this->belongsTo('App\Test');
    }
    
    public function respuesta()
    {
        return $this->hasMany('App\RespuestaPregunta','respuesta_por_pregunta')->withPivot('pregunta_id');
    }
}
