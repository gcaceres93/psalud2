<?php

namespace App\Http\Controllers;

use App\FamiliaresTipo;
use Illuminate\Http\Request;

class FamiliaresTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= FamiliaresTipo::all()->sortBy('id');
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
            $familiarestipo = new FamiliaresTipo();
            $familiarestipo->tipo_de_familiar = $request->tipo_de_familiar;
            $familiarestipo->save();
            return redirect()->route('familiarestipo.index');
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
    public function show(FamiliaresTipo $familiaresTipo)
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
        $familiarestipo = familiarestipo::findOrFail($familiarestipo);
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
        $familiarestipo = FamiliaresTipo::findOrFail($familiarestipo);
        $familiarestipo->tipo_de_familiar = $request->tipo_de_familiar;
        $familiarestipo->save();
        return redirect()->route('familiarestipo.index');
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
            $familiarestipo = FamiliaresTipo::findOrFail($familiarestipo);
            $familiarestipo->delete();
            return redirect()->route('familiarestipo.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
