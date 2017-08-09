<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Anamnesis;
use App\TestDiagnostico;
use App\Consulta;
use App\Diagnostico;

class DiagnosticoController extends Controller
{
    protected $path = 'diagnostico';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function diagnosticoAnamnesis($id){
        $anamnesis = DB::table('anamnesis as a')
        ->join('paciente as p','a.paciente_id','=','p.id')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->select('pe.nombre as pnombre','pe.apellido as papellido','a.*','p.id as pid')
        ->where('a.id','=',$id)
        ->first();
        $a = Anamnesis::findOrFail($id);
        
        
        $tests=DB::table('test_aplicado')
        ->join('test','test.id','=','test_aplicado.test_id')
        ->select('test_aplicado.*','test.nombre')
        ->where('paciente_id','=',$a->paciente_id)->get();
        $consultas = DB::table('consulta')->where('paciente_id','=',$a->paciente_id)->get();
        return view('pages.'.$this->path.'.createAnamnesis',compact('anamnesis','consultas','tests'));
        
    }
    
    public function index()
    {
        $data = DB::table('diagnostico as d')
        ->join('paciente as p','d.paciente_id','=','p.id')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->join('anamnesis as a','d.anamnesis_id','=','a.id')
        ->select('pe.nombre as pnombre','pe.apellido as papellido','a.id as aid','p.id as pid','d.*')
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function diagnosticoGuardar(Request $request)
    {
        $id=$request->ids;
        if ($id > 0){
            $diagnostico= $request->ids;
            
            return $this->update($request,$diagnostico);
        }else{
            return $this->store($request);
        }
    }
    
    
    
    public function store(Request $request)
    {
        
    
        try{
            $diagnostico = new Diagnostico();
            $diagnostico->consulta_id = $request->consulta;
            $diagnostico->anamnesis_id = $request->anamnesis;
            $diagnostico->paciente_id = $request->paciente;
            $diagnostico->diagnostico_presuntivo= $request->diagnostico_presuntivo;
            $diagnostico->diagnostico_final= $request->diagnostico_final;
            $diagnostico->observaciones= $request->observaciones;
            $diagnostico->recomendaciones= $request->recomendaciones;
            $diagnostico->resultado_obtenido= $request->resultado_obtenido;
            
            $diagnostico->acepta_tratamiento= $request->acepta_tratamiento;
            $diagnostico->save();
            
            foreach ($request->test as $tests){
                $test_diag = new TestDiagnostico();
                $test_diag ->diagnostico_id = $diagnostico->id;
                $test_diag->test_id = $tests;
                
                $test_diag->save();
                
            }
            return json_encode($diagnostico->id);
          
            
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
        
        $d = Diagnostico::findOrFail($id);
        $diagnostico = DB::table('diagnostico as d')
        ->join('paciente as p','d.paciente_id','=','p.id')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->join('anamnesis as a','d.anamnesis_id','=','a.id')
        ->join('consulta as c','d.consulta_id','=','c.id')
        ->select('pe.nombre as pnombre','pe.apellido as papellido','a.id as aid','p.id as pid','d.*','c.fecha','d.id as did')
        ->where('d.id','=',$id)
        ->first();
        
        $plan_tratamiento = DB::table('plan_tratamiento as pt')
        ->select('*')
        ->where('diagnostico_id','=',$id)
        ->first();
        
        $test_aplicados=DB::table('test_aplicado')
        ->join('test','test.id','=','test_aplicado.test_id')
        ->select('test_aplicado.*','test.nombre')
        ->where('paciente_id','=',$d->paciente_id)->get();
        $test_diagnosticado=DB::table('test_por_diagnostico')
        ->select('test_por_diagnostico.*')
        ->where('diagnostico_id','=',$d->id)->get();
       
        return view('pages.'.$this->path.'.show',compact('diagnostico','plan_tratamiento','test_aplicados','test_diagnosticado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diagnostico = DB::table('diagnostico as d')
        ->join('paciente as p','d.paciente_id','=','p.id')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->join('anamnesis as a','d.anamnesis_id','=','a.id')
        ->join('consulta as c','d.consulta_id','=','c.id')
        ->select('pe.nombre as pnombre','pe.apellido as papellido','a.id as aid','p.id as pid','d.*','c.fecha','d.id as did','c.id as cid')
        ->where('d.id','=',$id)
        ->first();
        $d = Diagnostico::findOrFail($id);
        $test_aplicados=DB::table('test_aplicado')
        ->join('test','test.id','=','test_aplicado.test_id')
        ->select('test_aplicado.*','test.nombre')
        ->where('paciente_id','=',$d->paciente_id)->get();
        $test_diagnosticado=DB::table('test_por_diagnostico')
        ->select('test_por_diagnostico.*')
        ->where('diagnostico_id','=',$d->id)->get();
        $consultas = DB::table('consulta')->where('paciente_id','=',$d->paciente_id)->get();
        return view('pages.'.$this->path.'.edit',compact('diagnostico','consultas','test_aplicados','test_diagnosticado'));
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
            $diagnostico = Diagnostico::findOrFail($id);
            $diagnostico->consulta_id = $request->consulta;
            $diagnostico->anamnesis_id = $request->anamnesis;
            $diagnostico->paciente_id = $request->paciente;
            $diagnostico->diagnostico_presuntivo= $request->diagnostico_presuntivo;
            $diagnostico->diagnostico_final= $request->diagnostico_final;
            $diagnostico->observaciones= $request->observaciones;
            $diagnostico->recomendaciones= $request->recomendaciones;
            $diagnostico->resultado_obtenido= $request->resultado_obtenido;
            
            $diagnostico->acepta_tratamiento= $request->acepta_tratamiento;
            $diagnostico->save();
            $tes=$request->test;
           
            $canti=count($tes);
            
            $diagnostico->test()->delete();
            //return json_encode($tes);
            foreach ($request->test as $tests){
                
                $test_diag = new TestDiagnostico();
                $test_diag ->diagnostico_id = $diagnostico->id;
                $test_diag->test_id = $tests;
                
                $test_diag->save();
                
            }
            return json_encode($diagnostico->id);
            
            
//             return redirect()->route('diagnostico.show',$diagnostico->id);
            
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
        //
    }
}
