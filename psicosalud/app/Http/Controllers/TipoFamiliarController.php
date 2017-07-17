<?php

namespace App\Http\Controllers;

use App\TipoFamiliar;
use Illuminate\Http\Request;

class TipoFamiliarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= TipoFamiliar::all()->sortBy('id');
        return view('pages.familiarestipo.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.familiarestipo.create');
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
            $familiarestipo = new TipoFamiliar();
            $familiarestipo->nombre = $request->nombre;
            $familiarestipo->save();
            return redirect()->route('tipoFamiliar.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FamiliaresTipo  $familiaresTipo
     * @return \Illuminate\Http\Response
     */
    public function show(TipoFamiliar $familiaresTipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FamiliaresTipo  $familiaresTipo
     * @return \Illuminate\Http\Response
     */
    public function edit ($familiarestipo)
    {
        $familiarestipo = TipoFamiliar::findOrFail($familiarestipo);
        return view('pages.familiarestipo.edit',compact('familiarestipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FamiliaresTipo  $familiaresTipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $familiarestipo)
    {
        $familiarestipo = TipoFamiliar::findOrFail($familiarestipo);
        $familiarestipo->nombre = $request->nombre;
        $familiarestipo->save();
        return redirect()->route('tipoFamiliar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FamiliaresTipo  $familiaresTipo
     * @return \Illuminate\Http\Response
     */
    public function destroy( $familiarestipo)
    {
         try{
            $familiarestipo = TipoFamiliar::findOrFail($familiarestipo);
            $familiarestipo->delete();
            return redirect()->route('tipoFamiliar.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
