<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ocupacion;
use Exception;
class OcupacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ocupacion::all()->sortBy("id");
        return view('pages.ocupacion.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ocupacion.create');
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
        	$ocupacion = new Ocupacion();
        	$ocupacion->nombre = $request->nombre;
        	$ocupacion->descripcion = $request->descripcion;
        	$ocupacion->save();
        	return redirect()->route('ocupacion.index');
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
    	$ocupacion = Ocupacion::findOrFail($id);
    	return view('pages.ocupacion.edit',compact('ocupacion'));
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
        $ocupacion = Ocupacion::findOrFail($id);
        $ocupacion->nombre = $request->nombre;
        $ocupacion->descripcion = $request->descripcion;
        $ocupacion->save();
        return redirect()->route('ocupacion.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
        	$ocupacion = Ocupacion::findOrFail($id);
        	$ocupacion->delete();
        	return redirect()->route('ocupacion.index');
        } catch(Exception $e){
            $var = '<script language="javascript">alert("No se puede eliminar este registro ya que tiene registros hijos asociados a otras tablas."); window.history.go(-1);</script>';
            return ("$var ");
//         	return "Fatal error - ".$e->getMessage();
        }
    }
}
