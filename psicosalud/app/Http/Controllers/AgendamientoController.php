<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Agendamiento;
use App\Paciente;
use App\Modalidad;
use App\Sucursal;

class AgendamientoController extends Controller
{
    protected $path = 'agendamiento';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Agendamiento::paginate(10)->sortBy('fecha_programada');
        return view('pages.'.$this->path.'.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes=DB::table('paciente')
        ->join('persona','paciente.persona_id','=','persona.id')
        ->select('paciente.*','persona.nombre','persona.apellido')->orderBy('persona.apellido')
        ->get();
        $empleados=DB::table('empleado')
        ->join('persona','empleado.persona_id','=','persona.id')
        ->join('cargo','empleado.cargo_id','=','cargo.id')
        ->select('empleado.*','persona.nombre','persona.apellido','cargo.descripcion')
        ->where('es_medico','=',true)
        ->groupBy('cargo.descripcion','persona.apellido','persona.nombre','empleado.id')
        ->get();
        $modalidades=Modalidad::all()->sortBy('descripcion');
        $sucursales=Sucursal::all()->sortBy('nombre');
        return view('pages.'.$this->path.'.create',compact('pacientes','modalidades','sucursales','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verificarDisponibilidad(Request $request){
        $hora_programada = $request->hora_programada;
        $fecha_programada = $request->fecha_programada;
        $sucursal = $request->sucursal;
        $medico = $request->medico;
        
        
        return json_encode($data);
       
    }
    
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
