<?php

namespace App\Http\Controllers;

use App\AplicarTest;
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
    public function show(AplicarTest $aplicarTest)
    {
        //
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
    public function update(Request $request, AplicarTest $aplicarTest)
    {
        //
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
