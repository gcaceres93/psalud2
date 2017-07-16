<?php

namespace App\Http\Controllers;

use App\Cargos;
use Illuminate\Http\Request;

class CargosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Cargos::all()->sortBy('id');
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
            $cargos = new Cargos();
            $cargos->descripcion = $request->descripcion;
            $cargos->save();
            return redirect()->route('cargos.index');
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
    public function show(Cargos $cargos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function edit( $cargos)
    {
         $cargos = Cargos::findOrFail($cargos);
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
        $cargos = Cargos::findOrFail($cargos);
        $cargos->descripcion = $request->descripcion;
        $cargos->save();
        return redirect()->route('cargos.index');
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
            $cargos = Cargos::findOrFail($cargos);
            $cargos->delete();
            return redirect()->route('cargos.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
