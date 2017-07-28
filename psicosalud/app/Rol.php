<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';
    public $timestamps = False;
    
    
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
