<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sucursal;
class Agendamiento extends Model
{
    protected $table = 'agendamiento';
    public $timestamps = false;
    
    public function sucursal(){
        return $this->belongsTo('App\Sucursal');
    }
}
