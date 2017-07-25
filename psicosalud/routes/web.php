<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('ocupacion', 'OcupacionController');
Route::resource('modalidad','ModalidadController');
Route::resource('tipoTerapia','TipoTerapiaController');
Route::resource('rol','RolController');
Route::resource('cargo','CargoController');
Route::resource('tipoFamiliar','TipoFamiliarController');
Route::resource('sucursal','SucursalController');
Route::resource('impuestos','ImpuestosController');
Route::resource('facturaconcepto','FacturaConceptoController');
Route::asd
// Agendamiento
Route::resource('agendamiento','AgendamientoController');
Route::post('agendamiento/verificarDisponibilidad', 'AgendamientoController@verificarDisponibilidad');

/*          PERSONAS          */
Route::resource('persona','PersonaController');
Route::resource('user','Auth\RegisterController');
Route::resource('paciente','PacienteController');
Route::resource('empleado','EmpleadoController');
Route::get('/medico','EmpleadoController@getMedicos')->name('medico.index');
Route::get('/medico/create','EmpleadoController@createMedico')->name('medico.create');
/*			PERSONAS 		  */

Route::get('/', 'HomeController@index')->name('home');


// Route::get('tipo_terapia','TipoTerapiaController@index');
// Route::resource('tipo_terapias','TipoTerapiaController');
/* ************ Ejemplos sencillos ************** 
Route::get('sucursal/{id}', function($id){
	$sucursal = App\Sucursal::find($id);
	return $sucursal->nombre;
});

Route::get('get_sucursal/{nombre}', function($nombre){
	 $sucursal = App\Sucursal::where('nombre','=', $nombre)->first();

	 echo $sucursal->nombre;
});
Route::get('movie', function(){
	$movie = App\Movie::find(1);
	print_r($movie);
});

Route::get('get_ocupacion/{id}', function($id){
	$ocupacion = App\Ocupacion::find($id);
	$personas = $ocupacion->personas;

	echo "Personas con la ocupacion ".$ocupacion->nombre."<br />";
	foreach ($personas as $persona) {
		echo "Nombre y apellido: ".$persona->nombre." ".$persona->apellido."<br />";
	}
});

Route::get('ocupacion', function(){
	$ocupaciones = App\Ocupacion::all();
	foreach ($ocupaciones as $ocupacion) {
		echo  $ocupacion->nombre . ":<br />";
	}
}); 

Route::get('persona', function(){
	$personas = App\Persona::all();
	foreach ($personas as $persona) {
		echo $persona->nombre . " | Ocupacion:". $persona->ocupacion->nombre."<br />";
	}
});

Route::get('users', ['uses' => 'UsersController@index']);
Route::get('users/create', ['uses' => 'UsersController@create']);
Route::post('users', ['uses' => 'UsersController@store']);

/*
Route::get('users',function() {
	$users = [
		'0' => [
			'first_name' => 'Renato',
			'last_name' => 'Hysa',
			'location' => 'Albania'
		],
		'1' => [
			'first_name' => 'Jessica',
			'last_name' => 'Alba',
			'location' => 'USA'
		]
	];
	return $users;
*/	


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
