<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\CuestionarioAnamnesis;

class CuestionarioAnamnesisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected $path = 'cuestionarioAnamnesis';
    public function index()
    {
        $data = CuestionarioAnamnesis::all()->sortBy('orden');
        return view('pages.'.$this->path.'.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ultimo = DB::table('cuestionario_anamnesis')->max('orden');     
        return view('pages.'.$this->path.'.create',compact('ultimo'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $cuestionario = new CuestionarioAnamnesis();
            $cuestionario->pregunta = $request->pregunta;
            $cuestionario->aclaracion_pregunta = $request->aclaracion_pregunta;
            if ($request->orden){
                $cuestionario->orden = $request->orden;
            }else{
                $cuestionario->orden = (DB::table('cuestionario_anamnesis')->max('orden')+1);
            }
            $cuestionario->grupo = $request->grupo;
            $cuestionario->save();
            return redirect()->route('cuestionarioAnamnesis.index');
        }catch (Exception $e){
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ultimo = DB::table('cuestionario_anamnesis')->max('orden');
        $cuestionario = CuestionarioAnamnesis::findOrFail($id);
        return view('pages.'.$this->path.'.edit',compact('cuestionario','ultimo'));
        
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
        try {
            $cuestionario = CuestionarioAnamnesis::findOrFail($id);
            $cuestionario->pregunta = $request->pregunta;
            $cuestionario->aclaracion_pregunta = $request->aclaracion_pregunta;
            if ($request->orden){
                $cuestionario->orden = $request->orden;
            }else{
                $cuestionario->orden = (DB::table('cuestionario_anamnesis')->max('orden')+1);
            }
            $cuestionario->grupo = $request->grupo;
            $cuestionario->save();
            return redirect()->route('cuestionarioAnamnesis.index');
        }catch (Exception $e){
            return "Fatal error - ".$e->getMessage();
            
        }
    }

    /**c
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $cuestionario = CuestionarioAnamnesis::findOrFail($id);
            $cuestionario->delete();
            return redirect()->route('cuestionarioAnamnesis.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
