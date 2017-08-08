<?php

namespace App\Http\Controllers;

use App\AplicarTest;
use App\TestAplicadoDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;


class AplicarTestController extends Controller
{
    protected $path = 'aplicarTest';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//         $data= AplicarTest::all()->sortBy('id');
        $data=DB::table('test_aplicado')
        ->join('test','test_aplicado.test_id','=','test.id')
        ->join('paciente','test_aplicado.paciente_id','=','paciente.id')
        ->join('persona','paciente.persona_id','=','persona.id')
        ->select('test_aplicado.*','persona.nombre as pnombre','persona.apellido as papellido','test.nombre as tnombre')
//         ->groupBy('persona.apellido','persona.nombre','paciente.id')
        ->orderBy('test_aplicado.id')
        ->get();
        return view('pages.'.$this->path.'.index',compact('data'));
    }
    public function editt()
    {
        //
        //         $data= AplicarTest::all()->sortBy('id');
        $data=DB::table('test_aplicado')
        ->join('test','test_aplicado.test_id','=','test.id')
        ->join('paciente','test_aplicado.paciente_id','=','paciente.id')
        ->join('persona','paciente.persona_id','=','persona.id')
        ->select('test_aplicado.*','persona.nombre as pnombre','persona.apellido as papellido','test.nombre as tnombre')
        //         ->groupBy('persona.apellido','persona.nombre','paciente.id')
        ->orderBy('test_aplicado.id')
        ->get();
        return view('pages.'.$this->path.'.editt',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $personas=DB::table('paciente')
        ->join('persona','paciente.persona_id','=','persona.id')
        ->select('paciente.*','persona.nombre','persona.apellido')
        ->groupBy('persona.apellido','persona.nombre','paciente.id')
        ->orderBy('persona.apellido')
        ->get();
        
        $test=DB::table('test')
        ->select('test.*')
        ->get();
        
        
        return view('pages.'.$this->path.'.create',compact('personas','test'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{
            $respuesta = new AplicarTest();
            $respuesta->paciente_id = $request->paciente;
            $respuesta->test_id = $request->test;
            $respuesta->fecha = $request->fecha;
            $respuesta->tipo_aplicacion = $request->tipo_aplicacion;
           
            $respuesta->save();
            return redirect()->route('aplicarTest.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AplicarTest  $aplicarTest
     * @return \Illuminate\Http\Response
     */
    public function show($aplicarTest)
    {
        //
        $aplicar = AplicarTest::findOrFail($aplicarTest);
        
        $personas=DB::table('paciente')
        ->join('persona','paciente.persona_id','=','persona.id')
        ->select('paciente.*','persona.nombre','persona.apellido')
        ->groupBy('persona.apellido','persona.nombre','paciente.id')
        ->orderBy('persona.apellido')
        ->get();
        
        $test=DB::table('test')
        ->select('test.*')
        ->get();
        
        $detalle = DB::table('test_aplicado_detalle')
        ->select('test_aplicado_detalle.*')
        ->where('test_aplicado_id','=',$aplicarTest)
        ->get();
        
        $resultado_valor = DB::table('respuesta_por_pregunta as rpp')
        ->join('pregunta_por_test as ppt','rpp.pregunta_id','=','ppt.id')
        ->join('test_aplicado as ta','ppt.test_id','=','ta.test_id')
        ->join('test_aplicado_detalle as tad', function ($join) {$join->on('ta.id', '=', 'tad.test_aplicado_id')->On('tad.pregunta_id', '=', 'ppt.id')->On('tad.respuesta_id', '=', 'rpp.id');})
        ->select(DB::raw('sum(rpp.valor)'))
        ->where('ta.id','=',$aplicar->id)
        ->get();

        $suma=$resultado_valor[0]->sum;
        
//         $resultado=DB::table('resultado_por_test')
//         ->select('resultado_por_test.nombre')
//         ->whereBetween($suma, ['valor_ini', 'valor_fin'])->get();
        $resultado=DB::select(DB::raw("SELECT rpt.nombre FROM  resultado_por_test as rpt WHERE test_id = '$aplicar->test_id' and '$suma' between valor_ini and valor_fin"));
        $nombre_resultado=$resultado[0]->nombre;
        
//         dd($detalle);
        return view('pages.'.$this->path.'.show',compact('personas','test','aplicar','detalle','nombre_resultado'));
    }
    
    public function traerTest(Request $request)
    {
        //
        
        $test=$request->test;
        
        
        $pregunta=DB::table('pregunta_por_test')
        ->join('respuesta_por_pregunta','pregunta_por_test.id','=','respuesta_por_pregunta.pregunta_id')
        ->select('pregunta_por_test.nombre as pnombre','pregunta_por_test.descripcion','pregunta_por_test.id as pid','respuesta_por_pregunta.nombre as rnombre','respuesta_por_pregunta.valor','respuesta_por_pregunta.id as rid')
        ->where('pregunta_por_test.test_id','=',$test)
        ->get();
       
        return json_encode($pregunta);
        
    }
    
    public function guardarRespuestaTest(Request $request)
    {
        //
        
        $test=$request->test;
        $id=$request->ids;
        
        return $this->update($request,$id);
        
        
        
        
        
   
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AplicarTest  $aplicarTest
     * @return \Illuminate\Http\Response
     */
    public function edit( $aplicarTest)
    {
        //
        $aplicar = AplicarTest::findOrFail($aplicarTest);
        
        $personas=DB::table('paciente')
        ->join('persona','paciente.persona_id','=','persona.id')
        ->select('paciente.*','persona.nombre','persona.apellido')
        ->groupBy('persona.apellido','persona.nombre','paciente.id')
        ->orderBy('persona.apellido')
        ->get();
        
        $test=DB::table('test')
        ->select('test.*')
        ->get();
        
        
        
        return view('pages.'.$this->path.'.edit',compact('personas','test','aplicar'));
        
    }
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AplicarTest  $aplicarTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $aplicarTest)
    {
        //
        $aplicar = AplicarTest::findOrFail($aplicarTest);
        
        
        try{
            
            $aplicar->paciente_id = $request->paciente;
            $aplicar->test_id = $request->test;
            $aplicar->fecha = $request->fecha;
            $aplicar->tipo_aplicacion = $request->tipo_aplicacion;
            $aplicar->resultado=$request->resultado_psi;
            
            $aplicar->save();
            
            $preguntas= $request->pregunta;
            $respuestas= $request->respuesta;
            $cantp = count($preguntas);
            $cantr = count($respuestas);
            if ($cantp != $cantr){
                return json_encode(False);
            }
            $aplicar->detalle()->delete();
            for($i=0;$i<$cantp; $i++){
                
                $aplicar_detalle = New TestAplicadoDetalle();
                $aplicar_detalle->test_aplicado_id=$aplicarTest;
                
                
                foreach ($preguntas as $key=>$pregu)
                {
                    if ($key == $i )
                    {
                        
                        $preg = $pregu;
                    }
                    
                }
               
                foreach ($respuestas as $key=>$respu)
                {
                    if ($key == $i )
                    {
                       
                        $resp = $respu;
                    }
                    
                }
                
                $aplicar_detalle->pregunta_id=$preg;
                $aplicar_detalle->respuesta_id=$resp;
                $aplicar_detalle->save();
              
                
                
            }
            
            return json_encode($aplicar_detalle);
            
            //return redirect()->route('aplicarTest.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AplicarTest  $aplicarTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(AplicarTest $aplicarTest)
    {
        //
    }
}
