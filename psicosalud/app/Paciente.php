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
	
	public function personas()
	{
	    return $this->belongsToMany('App\Persona','familiar_por_paciente')->withPivot('tipo_familiar_id');
	}
	
	public function tipoFamiliares()
	{
	    return $this->belongsToMany('App\TipoFamiliar','familiar_por_paciente')->withPivot('persona_id');
	}
	
	

	
}
