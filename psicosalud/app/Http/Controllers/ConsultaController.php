<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Consulta;

class ConsultaController extends Controller
{
    protected $path = "consulta";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('consulta as c')
        ->join('paciente as p','c.paciente_id','=','p.id')
        ->join('persona as ppaciente','p.persona_id','=','ppaciente.id')
        ->join('persona as pempleado','c.empleado_id','pempleado.id')
        ->join('empleado as e','pempleado.id','e.id')
        ->select('c.*','ppaciente.nombre as pacienteNombre','ppaciente.apellido as pacienteApellido'
            ,'pempleado.nombre as medicoNombre','pempleado.apellido as medicoApellido')
            ->orderBy('c.fecha')
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
      
        return view('pages.'.$this->path.'.create',compact('pacientes','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $consulta = new Consulta();
            $consulta->fecha = $request->fecha;
            $consulta->empleado_id = $request->medico;
            $consulta->paciente_id = $request->paciente;
            $consulta->cantidad_horas = $request->cantidad_horas;
            $consulta->observaciones = $request->observaciones;
            $consulta->estado = "Consulta";           
            $consulta->save();
            return "si";
        
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
        $consulta=Consulta::findOrFail($id);
        $pac=DB::table('paciente')
        ->join('persona','paciente.persona_id','=','persona.id')
        ->select('paciente.*','persona.nombre','persona.apellido')
        ->orderBy('persona.apellido')
        ->where('paciente.id','=',$consulta->paciente->id)
        ->first();
        $emp=DB::table('empleado')
        ->join('persona','empleado.persona_id','=','persona.id')
        ->select('empleado.*','persona.nombre','persona.apellido')->orderBy('persona.apellido')
        ->where('empleado.id','=',$consulta->empleado->id)
        ->first();
        
        return view('pages.'.$this->path.'.show',compact('consulta','pac','emp'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta=Consulta::findOrFail($id);
        $pac=DB::table('paciente')
        ->join('persona','paciente.persona_id','=','persona.id')
        ->select('paciente.*','persona.nombre','persona.apellido')
        ->orderBy('persona.apellido')
        ->where('paciente.id','=',$consulta->paciente->id)
        ->first();
        $emp=DB::table('empleado')
        ->join('persona','empleado.persona_id','=','persona.id')
        ->select('empleado.*','persona.nombre','persona.apellido')->orderBy('persona.apellido')
        ->where('empleado.id','=',$consulta->empleado->id)
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
       
        return view('pages.'.$this->path.'.edit',compact('consulta','pac','emp','pacientes','empleados'));
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
            $consulta = Consulta::findOrfail($id);
            $consulta->fecha = $request->fecha;
            $consulta->empleado_id = $request->medico;
            $consulta->paciente_id = $request->paciente;
            $consulta->observaciones = $request->observaciones;
            $consulta->cantidad_horas = $request->cantidad_horas;
            $consulta->save();
            return redirect()->route('consulta.index');
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
            $consulta = Consulta::findOrFail($id);
            $consulta->delete();
            return redirect()->route('consulta.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
