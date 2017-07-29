<?php

namespace App\Http\Controllers;

use App\TarifaHora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Empleado;
use App\Modalidad;

class TarifaHoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//         $data = TarifaHora::all()->sortBy('id');
        $data=TarifaHora::select(DB::raw('tarifa_hora.*,persona.nombre,persona.apellido,modalidad.descripcion'))
        ->join('empleado','empleado.id','=','tarifa_hora.empleado_id')
        ->join('persona','empleado.persona_id','=','persona.id')
        ->join('modalidad','modalidad.id','=','tarifa_hora.modalidad_id')
        ->orderBy('persona.apellido')
        ->get();
        
       
        
//         $data = DB::table('agendamiento as a')
//         ->join('paciente as p','a.paciente_id','=','p.id')
//         ->join('persona as ppaciente','p.persona_id','=','ppaciente.id')
//         ->join('persona as pempleado','a.empleado_id','pempleado.id')
//         ->join('empleado as e','pempleado.id','e.id')
//         ->join('modalidad as m','a.modalidad_id','m.id')
//         ->join('sucursal as s','a.sucursal_id','s.id')
//         ->select('a.*','ppaciente.nombre as pacienteNombre','ppaciente.apellido as pacienteApellido'
//             ,'pempleado.nombre as medicoNombre','pempleado.apellido as medicoApellido','m.descripcion as modalidad'
//             ,'s.nombre as sucursal')
//             ->get();
        
        return view('pages.tarifaHora.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Empleado::where('es_medico','true')->get();
        $modalidades = Modalidad::all();
        return view('pages.tarifaHora.create',compact('data','modalidades'));
//         $data = TarifaHora::all()->sortBy('id');
//         return view('pages.tarifaHora.create', compact('data'));
        //
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
            $tarifahora = new TarifaHora();
            $tarifahora->empleado_id = $request->persona;
            $tarifahora->modalidad_id = $request->modalidad;
            $tarifahora->codigo = $request->codigo;
            $tarifahora->tarifa = $request->tarifa;
            $tarifahora->save();
            return redirect()->route('tarifaHora.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TarifaHora  $tarifaHora
     * @return \Illuminate\Http\Response
     */
    public function show(TarifaHora $tarifaHora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TarifaHora  $tarifaHora
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::where('es_medico','true')->get();
        $tarifa = TarifaHora::findOrFail($id);
        $modalidades = Modalidad::all()->sortBy('descripcion');
        return view('pages.tarifaHora.edit',compact('empleado','modalidades','tarifa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TarifaHora  $tarifaHora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $tarifaHora)
    {
        //
        $tarifa = TarifaHora::findOrFail($tarifaHora);
        $tarifa->empleado_id = $request->empleado;
        $tarifa->modalidad_id = $request->modalidad;
        $tarifa->codigo = $request->codigo;
        $tarifa->tarifa = $request->tarifa;
        $tarifa->save();
        
       return redirect()->route('tarifaHora.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TarifaHora  $tarifaHora
     * @return \Illuminate\Http\Response
     */
    public function destroy( $tarifaHora)
    {
        //
        try{
            $tarifa = TarifaHora::findOrFail($tarifaHora);
            $tarifa->delete();
            return redirect()->route('tarifaHora.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
