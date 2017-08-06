<?php

namespace App\Http\Controllers;

use App\RespuestaPregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class RespuestaPreguntaController extends Controller
{
    private $path = 'respuestaTest';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( $request)
    {
        //
        
      
        try{
            $canti=count($request->nombre);
            for ($i = 0; $i < $canti; $i++) {
                
                
                foreach ($request->idr as $key=>$ids)
                {
                    if ($key == $i )
                    {
                        if ($ids > 0){
                            $respuesta = RespuestaPregunta::findOrFail($ids);
                            $respuesta->pregunta_id=$request->pregunta;}
                            else{
                                $respuesta = new RespuestaPregunta();
                                $respuesta->pregunta_id=$request->pregunta;
                            }
                    }
                    
                }
                
                foreach ($request->nombre as $key=>$nombre)
                {
                    if ($key == $i )
                    {
                        $resp = $nombre;
                    }
                    
                }
                
                foreach ($request->valor as $key=>$valor)
                {
                    if ($key == $i )
                    {
                        $val = $valor;
                    }
                    
                }
               
               $respuesta->nombre = $resp;
               $respuesta->valor=$val;
               $respuesta->save();
               
            }
            
            
            
            $respue = DB::table('respuesta_por_pregunta')
            ->select('id')
            ->where('pregunta_id', '=', $request->pregunta)
            ->get();
            return json_encode($respue);
            //             return redirect()->route('test.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RespuestaPregunta  $respuestaPregunta
     * @return \Illuminate\Http\Response
     */
    public function show(RespuestaPregunta $respuestaPregunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RespuestaPregunta  $respuestaPregunta
     * @return \Illuminate\Http\Response
     */
    public function edit($respuestaPregunta)
    {
        
        $pregrep = DB::table('respuesta_por_pregunta')
        ->select('respuesta_por_pregunta.*')
        ->where('pregunta_id', '=', $respuestaPregunta)
        ->get();

        $preg =DB::table('pregunta_por_test')
        ->select('nombre as nombre','descripcion as descripcion','test_id','id')
        ->where('id', '=', $respuestaPregunta)
        ->get();
       
      
        
        
        return view('pages.'.$this->path.'.edit',compact('preg','respuestaPregunta','pregrep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RespuestaPregunta  $respuestaPregunta
     * @return \Illuminate\Http\Response
     */
    
    public function guardarRespuesta (Request $request)
    {
        
            return $this->store($request);
        
    
        
    }
    public function update(Request $request, RespuestaPregunta $respuestaPregunta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RespuestaPregunta  $respuestaPregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(RespuestaPregunta $respuestaPregunta)
    {
        //
    }
}
