<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
	protected $table = 'paciente';
	public $timestamps = false;

	public function persona()
	{
		return $this->belongsTo('App\Persona');
	}

	
}
