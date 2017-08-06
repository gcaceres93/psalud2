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

/* ANAMNESIS */
Route::resource('cuestionarioAnamnesis','CuestionarioAnamnesisController');
Route::resource('anamnesis','AnamnesisController');
Route::get('/existeAnamnesis/{id}','AnamnesisController@existeAnamnesis');
Route::get('/anamnesisPaciente/{id}','AnamnesisController@anamnesisPaciente')->name('anamnesis.anamnecisPaciente');
Route::get('/imprimirAnamnesis/{id}','AnamnesisController@imprimirAnamnesis')->name('anamnesis.imprimirAnamnesis');
Route::resource('ocupacion', 'OcupacionController');
Route::resource('modalidad','ModalidadController');
Route::resource('tipoTerapia','TipoTerapiaController');
Route::resource('rol','RolController');
Route::resource('cargo','CargoController');

/* CONSULTAS*/
Route::resource('consulta','ConsultaController');
Route::post('/consulta/store','ConsultaController@store');



Route::resource('tipoFamiliar','TipoFamiliarController');
Route::resource('sucursal','SucursalController');
Route::resource('impuestos','ImpuestosController');
Route::resource('tarifaHora','TarifaHoraController');
Route::resource('facturaconcepto','FacturaConceptoController'); 
//Factura
Route::resource('factura','FacturaController');
Route::get('/verificarConsulta','FacturaController@verificarConsulta' ); 
Route::get('/traerConsulta','FacturaController@traerConsulta' );  
Route::get('/tablaDinamica','FacturaController@tablaDinamica' );  
Route::get('/tablaDinamicaupdate','FacturaController@tablaDinamicaupdate');

//Cobrar
Route::resource('cobro','CobroController');
// Agendamiento
Route::resource('agendamiento','AgendamientoController');
Route::get('/verificarDisponibilidad','AgendamientoController@verificarDisponibilidad' );
Route::get('/verificarAgenda','AgendamientoController@verificarAgenda' );
Route::get('/agendas','AgendamientoController@listarAgendas' );
Route::get('/mostrarAgenda','AgendamientoController@mostrarAgenda' );
Route::get('/reporteAsistencia','AgendamientoController@reporteAsistencia' );

// Test
Route::resource('test','TestController');
Route::post('/guardarPregunta','TestController@guardarPregunta');
Route::resource('respuestaPregunta','RespuestaPreguntaController');
Route::post('/guardarRespuesta','RespuestaPreguntaController@guardarRespuesta');
Route::resource('aplicarTest','AplicarTestController');
Route::resource('/traerTest','AplicarTestController@traerTest' );
/*          PERSONAS          */

Route::resource('persona','PersonaController');
Route::resource('user','Auth\RegisterController');
Route::resource('paciente','PacienteController');
Route::post('/guardarPaciente','PacienteController@store' );
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
