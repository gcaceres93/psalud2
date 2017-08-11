<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;
use Exception;
class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $data= Cargo::all()->sortBy('id');
        return view('pages.cargos.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.cargos.create');
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
            $cargos = new Cargo();
            $cargos->descripcion = $request->descripcion;
             if ($request['profesional_salud']){
                 $cargos->profesional_salud=true;
             }else{
                 $cargos->profesional_salud=false;
             }
            $cargos->save();
            return redirect()->route('cargo.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function show( $cargos)
    {
        //
        $cargos = Cargo::findOrFail($cargos);
        return view('pages.cargos.show',compact('cargos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function edit( $cargos)
    {
         $cargos = Cargo::findOrFail($cargos);
        return view('pages.cargos.edit',compact('cargos'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cargos)
    {
        $cargos = Cargo::findOrFail($cargos);
        $cargos->descripcion = $request->descripcion;
        if ($request['profesional_salud']){
                 $cargos->profesional_salud=true;
             }else{
                 $cargos->profesional_salud=false;
        }
        $cargos->save();
        return redirect()->route('cargo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function destroy( $cargos)
    {
         try{
            $cargos = Cargo::findOrFail($cargos);
            $cargos->delete();
            return redirect()->route('cargo.index');
        } catch(Exception $e){
            $var = '<script language="javascript">alert("No se puede eliminar este registro ya que tiene registros hijos asociados a otras tablas."); window.history.go(-1);</script>';
            return ("$var ");
//             return "Fatal error - ".$e->getMessage();
        }
    }
}
