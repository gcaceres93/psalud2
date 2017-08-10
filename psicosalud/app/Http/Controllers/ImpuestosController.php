<?php

namespace App\Http\Controllers;

use App\Impuestos;
use Illuminate\Http\Request;
use Exception;
class ImpuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Impuestos::all()->sortBy('id');
        return view('pages.impuestos.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.impuestos.create');
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
            $impuestos = new Impuestos();
            $impuestos->nombre = $request->nombre;
            $impuestos->porcentaje = $request->porcentaje;
            $impuestos->save();
            return redirect()->route('impuestos.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Impuestos  $impuestos
     * @return \Illuminate\Http\Response
     */
    public function show(Impuestos $impuestos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Impuestos  $impuestos
     * @return \Illuminate\Http\Response
     */
    public function edit( $impuestos)
    {
        $impuestos = Impuestos::findOrFail($impuestos);
        return view('pages.impuestos.edit',compact('impuestos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Impuestos  $impuestos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $impuestos)
    {
        $impuestos = Impuestos::findOrFail($impuestos);
        $impuestos->nombre = $request->nombre;
        $impuestos->porcentaje = $request->porcentaje;
        $impuestos->save();
        return redirect()->route('impuestos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Impuestos  $impuestos
     * @return \Illuminate\Http\Response
     */
    public function destroy( $impuestos)
    {
        try{
            $impuestos = Impuestos::findOrFail($impuestos);
            $impuestos->delete();
            return redirect()->route('impuestos.index');
        } catch(Exception $e){
            $var = '<script language="javascript">alert("No se puede eliminar este registro ya que tiene registros hijos asociados a otras tablas."); window.history.go(-1);</script>';
            return ("$var ");
//             return "Fatal error - ".$e->getMessage();
        }
    }
}
