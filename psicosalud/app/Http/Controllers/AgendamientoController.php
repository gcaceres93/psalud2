<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
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
        $data = DB::table('agendamiento as a')
        ->join('paciente as p','a.paciente_id','=','p.id')
        ->join('persona as ppaciente','p.persona_id','=','ppaciente.id')
        ->join('persona as pempleado','a.empleado_id','pempleado.id')
        ->join('empleado as e','pempleado.id','e.id')
        ->join('modalidad as m','a.modalidad_id','m.id')
        ->join('sucursal as s','a.sucursal_id','s.id')
        ->select('a.*','ppaciente.nombre as pacienteNombre','ppaciente.apellido as pacienteApellido'
            ,'pempleado.nombre as medicoNombre','pempleado.apellido as medicoApellido','m.descripcion as modalidad'
            ,'s.nombre as sucursal')
        ->get();
        
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
        try{
            $agendamiento = new Agendamiento();
            $agendamiento->hora_programada = $request->hora_programada;
            $agendamiento->fecha_programada = $request->fecha_programada;
            $agendamiento->sucursal_id = $request->sucursal;
            $agendamiento->empleado_id = $request->medico;
            $agendamiento->paciente_id = $request->paciente;
            $agendamiento->modalidad_id = $request->modalidad;
            $agendamiento->comentario = $request->comentario;
            
            $agendamiento->save();
            return redirect()->route('agendamiento.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente=DB::table('paciente')
        ->join('persona','paciente.persona_id','=','persona.id')
        ->select('paciente.*','persona.nombre','persona.apellido')->orderBy('persona.apellido')
        ->where('id','=',$agendamiento->paciente_id)
        ->get();
        $empleado=DB::table('empleado')
        ->join('persona','empleado.persona_id','=','persona.id')
        ->join('cargo','empleado.cargo_id','=','cargo.id')
        ->select('empleado.*','persona.nombre','persona.apellido','cargo.descripcion')
        ->where('es_medico','=',true)
        ->where('id','=',$agendamiento->empleado_id)
        ->groupBy('cargo.descripcion','persona.apellido','persona.nombre','empleado.id')
        ->get();
        $modalidad=Modalidad::findOrFail($agendamiento->modalidad_id);
        $sucursal=Sucursal::findOrFail($agendamiento->sucursal_id);
        
        return view('pages.'.$this->path.'.show',compact('paciente','modalidad','sucursal','empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $agendamiento=Agendamiento::findOrFail($id);
        $pac=DB::table('paciente')
        ->join('persona','paciente.persona_id','=','persona.id')
        ->select('paciente.*','persona.nombre','persona.apellido')
        ->orderBy('persona.apellido')
        ->where('paciente.id','=',$agendamiento->paciente->id)
        ->first();
        $emp=DB::table('empleado')
        ->join('persona','empleado.persona_id','=','persona.id')
        ->select('empleado.*','persona.nombre','persona.apellido')->orderBy('persona.apellido')
        ->where('empleado.id','=',$agendamiento->empleado->id)
        ->first();
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
        return view('pages.'.$this->path.'.edit',compact('agendamiento','pac','emp','pacientes','modalidades','sucursales','empleados'));
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
        try{
            $agendamiento = Agendamiento::findOrfail($id);
            $agendamiento->hora_programada = $request->hora_programada;
            $agendamiento->fecha_programada = $request->fecha_programada;
            $agendamiento->sucursal_id = $request->sucursal;
            $agendamiento->empleado_id = $request->medico;
            $agendamiento->paciente_id = $request->paciente;
            $agendamiento->modalidad_id = $request->modalidad;
            $agendamiento->comentario = $request->comentario;
            $agendamiento->save();
            return redirect()->route('agendamiento.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $agendamiento = Agendamiento::findOrFail($id);
            $agendamiento->delete();
            return redirect()->route('agendamiento.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
