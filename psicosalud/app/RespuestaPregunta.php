<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaPregunta extends Model
{
    //
    protected $table = 'respuesta_por_pregunta';
    public $timestamps = false;
    
    
    public function pregunta()
    {
        return $this->belongsTo('App\PreguntaTest');
    }
}
