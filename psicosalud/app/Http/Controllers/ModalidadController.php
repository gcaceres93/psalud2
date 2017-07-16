<?php

namespace App\Http\Controllers;

use App\Modalidad;
use Illuminate\Http\Request;

class ModalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Modalidad::all()->sortBy('id');
        return  view('pages.modalidad.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.modalidad.create');
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
            $modalidad = new Modalidad();
            $modalidad->descripcion = $request->descripcion;
            $modalidad->save();
            return redirect()->route('modalidad.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modalidad  $modalidad
     * @return \Illuminate\Http\Response
     */
    public function show(Modalidad $modalidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modalidad  $modalidad
     * @return \Illuminate\Http\Response
     */
    public function edit($modalidad)
    {
        $modalidad = Modalidad::findOrFail($modalidad);
        return view('pages.modalidad.edit',compact('modalidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modalidad  $modalidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $modalidad = Modalidad::findOrFail($id);
        $modalidad->descripcion = $request->descripcion;
        $modalidad->save();
        return redirect()->route('modalidad.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modalidad  $modalidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $modalidad = Modalidad::findOrFail($id);
            $modalidad->delete();
            return redirect()->route('modalidad.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
