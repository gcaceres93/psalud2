<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\TipoTerapia;
use App\PlanTratamiento;

class PlanTratamientoController extends Controller
{
    private $path = 'planTratamiento';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('plan_tratamiento as pt')
        ->join('paciente as p','pt.paciente_id','=','p.id')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->join('diagnostico as d','pt.diagnostico_id','=','d.id')
        ->select('pe.nombre as pnombre','pe.apellido as papellido','d.id as did','p.id as pid','pt.*')
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
        
    }
    
    public function planDiagnostico($id)
    {
        $diagnostico = DB::table('diagnostico as d')
        ->join('paciente as p','d.paciente_id','=','p.id')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->select('pe.nombre as pnombre','pe.apellido as papellido','d.*','p.id as pid')
        ->where('d.id','=',$id)
        ->first();
        $tipoTerapias = TipoTerapia::all();
        return view('pages.'.$this->path.'.createDiagnostico',compact('diagnostico','tipoTerapias'));
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
            $pl = new PlanTratamiento();
            $pl->tipo_terapia_id = $request->tipoTerapia;
            $pl->paciente_id = $request->paciente;
            $pl->diagnostico_id = $request->diagnostico;
            $pl->fecha_inicio = $request->fecha_inicio;
            $pl->fecha_final = $request->fecha_final;
            $pl->cantidad_sesiones = $request->cantidad_sesiones;
            $pl->alcance = $request->alcance;
            $pl->resultados_esperados = $request->resultados_esperados;
            $pl->save();
            return redirect()->route('planTratamiento.show',$pl->id);
            
         }catch (Exception $e){
             echo "Fatal error.$e.getMessage()";
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
        $plan = DB::table('plan_tratamiento as pt')
        ->join('paciente as p','pt.paciente_id','=','p.id')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->join('diagnostico as d','pt.diagnostico_id','=','d.id')
        ->join('tipo_terapia as tp','pt.tipo_terapia_id','=','tp.id')
        ->select('pe.nombre as pnombre','pe.apellido as papellido','pe.id as pid','pt.*','d.id as did','tp.nombre as tnombre','tp.id as tid')
        ->where('pt.id','=',$id)
        ->first();
        $tipoTerapias = TipoTerapia::all();
        return view('pages.'.$this->path.'.show',compact('plan','tipoTerapias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = DB::table('plan_tratamiento as pt')
        ->join('paciente as p','pt.paciente_id','=','p.id')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->join('diagnostico as d','pt.diagnostico_id','=','d.id')
        ->join('tipo_terapia as tp','pt.tipo_terapia_id','=','tp.id')
        ->select('pe.nombre as pnombre','pe.apellido as papellido','pe.id as pid','pt.*','d.id as did','tp.nombre as tnombre','tp.id as tid')
        ->where('pt.id','=',$id)
        ->first();
        $tipoTerapias = TipoTerapia::all();
        return view('pages.'.$this->path.'.edit',compact('plan','tipoTerapias'));
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
            $pl = PlanTratamiento::findOrFail($id);
            $pl->tipo_terapia_id = $request->tipoTerapia;
            $pl->paciente_id = $pl->paciente_id;
            $pl->diagnostico_id = $request->diagnostico;
            $pl->fecha_inicio = $request->fecha_inicio;
            $pl->fecha_final = $request->fecha_final;
            $pl->cantidad_sesiones = $request->cantidad_sesiones;
            $pl->alcance = $request->alcance;
            $pl->resultados_esperados = $request->resultados_esperados;
            $pl->save();
            return redirect()->route('planTratamiento.show',$pl->id);
            
        }catch (Exception $e){
            echo "Fatal error.$e.getMessage()";
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
       //
    }
}
