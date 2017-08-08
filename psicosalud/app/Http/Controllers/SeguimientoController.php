<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\PlanTratamiento;
use App\Seguimiento;

class SeguimientoController extends Controller
{
    protected $path = 'seguimiento';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

   
    public function listarSeguimientoTratamiento($id){
        $data = DB::table('tratamiento_seguimiento as ts')
        ->join('paciente as p','ts.paciente_id','=','p.id')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->join('consulta as c','ts.consulta_id','=','c.id')
        ->join('plan_tratamiento as pt','ts.plan_tratamiento_id','=','pt.id')
        ->select('pe.nombre as pnombre','pe.apellido as papellido','ts.*','p.id as pid','c.fecha as fecha')
        ->where('pt.id','=',$id)
        ->get();
        return view('pages.'.$this->path.'.listarSeguimientoTratamiento',compact('data','id'));
    }
    
    public function seguimientoTratamiento($id){
        $plan = DB::table('plan_tratamiento as pt')
        ->join('paciente as p','pt.paciente_id','=','p.id')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->select('pe.nombre as pnombre','pe.apellido as papellido','pt.*','p.id as pid')
        ->where('pt.id','=',$id)
        ->first();
        $p = PlanTratamiento::findOrFail($id);
        $consultas = DB::table('consulta')->where('paciente_id','=',$p->paciente_id)->get();
        return view('pages.'.$this->path.'.createSeguimiento',compact('plan','consultas'));
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
            $seguimiento = new Seguimiento();
            $seguimiento->plan_tratamiento_id=$request->plan;
            $seguimiento->consulta_id=$request->consulta;
            $seguimiento->observaciones=$request->observaciones;
            $seguimiento->paciente_id=$request->paciente;
            $seguimiento->save();
            return redirect()->route('seguimiento.listarSeguimientoTratamiento',$seguimiento->plan_tratamiento_id);
        }catch (Exception $e){
            echo "Error: $e.getMessage()";
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
        $seguimiento = DB::table('tratamiento_seguimiento as ts')
        ->join('paciente as p','ts.paciente_id','=','p.id')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->join('consulta as c','ts.consulta_id','=','c.id')
        ->join('plan_tratamiento as pt','ts.plan_tratamiento_id','=','pt.id')
        ->select('pe.nombre as pnombre','pe.apellido as papellido','ts.*','p.id as pid','c.fecha as fecha','c.id as cid','pt.id as ptid')
        ->where('ts.id','=',$id)
        ->first();
        return view('pages.'.$this->path.'.show',compact('seguimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seguimiento = DB::table('tratamiento_seguimiento as ts')
        ->join('paciente as p','ts.paciente_id','=','p.id')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->join('consulta as c','ts.consulta_id','=','c.id')
        ->join('plan_tratamiento as pt','ts.plan_tratamiento_id','=','pt.id')
        ->select('pe.nombre as pnombre','pe.apellido as papellido','ts.*','p.id as pid','c.fecha as fecha','c.id as cid','pt.id as ptid')
        ->where('ts.id','=',$id)
        ->first();
        $p = PlanTratamiento::findOrFail($seguimiento->ptid);
        $consultas = DB::table('consulta')->where('paciente_id','=',$p->paciente_id)->get();
        return view('pages.'.$this->path.'.edit',compact('seguimiento','consultas'));
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
            $seguimiento = Seguimiento::findOrFail($id);
            $seguimiento->plan_tratamiento_id=$request->plan;
            $seguimiento->consulta_id=$request->consulta;
            $seguimiento->observaciones=$request->observaciones;
            $seguimiento->paciente_id=$request->paciente;
            $seguimiento->save();
            return redirect()->route('seguimiento.show',$seguimiento->id);
            
        }catch (Exception $e){
            echo "Error: $e.getMessage()";
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
