<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }
    
    public function roles(){
        return $this->belongsToMany('App\Rol','usuario_por_rol','usuario_id','rol_id');
    }
    
    public function getRolesListAttribute(){
        return $this->roles->lists('id');
    }
}
