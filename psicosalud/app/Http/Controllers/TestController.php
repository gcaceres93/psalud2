<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use App\PreguntaTest;
use Illuminate\Support\Facades\DB;
use Exception;

class TestController extends Controller
{
    private $path = 'test';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $data = Test::all()->sortBy('id');
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
       # $data = Empleado::where('es_medico','true')->get();
        #$modalidades = Modalidad::all();
        return view('pages.'.$this->path.'.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    
    public function guardarPregunta(Request $request){
        
        //         dd($request->cantidad);
        //dd($facturat);
        // $factura->store($request);
        $id=$request->ids;
        if ($id > 0){
            $test= $request->ids;
            
            return $this->update($request,$test);
        }else{
            return $this->store($request);
        }
    }
    public function store(Request $request)
    {
        //
       
        if ($request->abstracto == True){
            $abst=True;
        }
        else {
            $abst=False;
        }
        try{
            $test = new Test();
            $test->nombre = $request->nombre;
            $test->abstracto =$abst;
            $test->save();
            
            $lastInsertedId=$test->id;
            
            
            $canti=count($request->pregunta);
                   
            $vari='';
            for ($i = 0; $i < $canti; $i++) {
                
                $pregunta = new PreguntaTest();
                $pregunta->test_id=$lastInsertedId;
                
                foreach ($request->pregunta as $key=>$nombre)
                {
                    if ($key == $i )
                    {
                        $preg = $nombre;
                    }
                    
                }
                
                foreach ($request->descripcion as $key=>$descripcion)
                {
                    if ($key == $i )
                    {
                        $descr = $descripcion;
                    }
                    
                }
                
                $pregunta->nombre=$preg;
                $pregunta->descripcion=$descr;
                $pregunta->save();
           }         
              
                $preg = DB::table('pregunta_por_test')
                ->select('id','test_id')
                ->where('test_id', '=', $lastInsertedId)
                ->get();
                
                return json_encode($preg);
//             return redirect()->route('test.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit( $tests)
    {
        //
        
       
        $test = Test::findOrFail($tests);
        $preguntas =  DB::table('pregunta_por_test')
        ->select('pregunta_por_test.*')
        ->where('test_id', '=', $test->id)
        ->get();
        
        return view('pages.'.$this->path.'.edit',compact('test','preguntas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $test)
    {
        //
        if ($request->abstracto == True){
            $abst=True;
        }
        else {
            $abst=False;
        }
        
        $test = Test::findOrFail($test);
            
        $test->nombre = $request->nombre;
        $test->abstracto = $abst;
        
        $test->save();
        
        $lastInsertedId=$test->id;
        
        $canti=count($request->idp);
       
        
        $vari='';
        for ($i = 0; $i < $canti; $i++) {
            
            foreach ($request->idp as $key=>$id_pregunta)
            {
                if ($key == $i )
                {
                    if ($id_pregunta > 0){
                        $pregunta = PreguntaTest::findOrFail($id_pregunta);
                        $pregunta->test_id=$lastInsertedId;}
                    else{
                        $pregunta = new PreguntaTest();
                        $pregunta->test_id=$lastInsertedId;
                    }
                }
                
            }
           
            foreach ($request->pregunta as $key=>$nombre)
            {
                if ($key == $i )
                {
                    $preg = $nombre;
                }
                
            }
            
            foreach ($request->descripcion as $key=>$descripcion)
            {
                if ($key == $i )
                {
                    $descr = $descripcion;
                }
                
            }
            
            $pregunta->nombre=$preg;
            $pregunta->descripcion=$descr;
            $pregunta->save();
        }         
        
        
        $preg = DB::table('pregunta_por_test')
        ->select('id','test_id')
        ->where('test_id', '=', $lastInsertedId)
        ->get();
        
        return json_encode($preg);
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy( $test)
    {
        //
        try{
            $test = Test::findOrFail($test);
            $test->delete();
            return redirect()->route('test.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
