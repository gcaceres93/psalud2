<?php

namespace App\Http\Controllers;

use App\FacturaConcepto;
use Illuminate\Http\Request;

class FacturaConceptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= FacturaConcepto::all()->sortBy('id');
        return view('pages.facturaconcepto.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.facturaconcepto.create');
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
            $facturaconcepto = new FacturaConcepto();
            $facturaconcepto->descripcion = $request->descripcion;
            $facturaconcepto->save();
            return redirect()->route('facturaconcepto.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FacturaConcepto  $facturaConcepto
     * @return \Illuminate\Http\Response
     */
    public function show(FacturaConcepto $facturaConcepto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FacturaConcepto  $facturaConcepto
     * @return \Illuminate\Http\Response
     */
    public function edit( $facturaconcepto)
    {
        $facturaconcepto = FacturaConcepto::findOrFail($facturaconcepto);
        return view('pages.facturaconcepto.edit',compact('facturaconcepto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FacturaConcepto  $facturaConcepto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $facturaconcepto)
    {
        $facturaconcepto = FacturaConcepto::findOrFail($facturaconcepto);
        $facturaconcepto->descripcion = $request->descripcion;
        $facturaconcepto->save();
        return redirect()->route('facturaconcepto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FacturaConcepto  $facturaConcepto
     * @return \Illuminate\Http\Response
     */
    public function destroy( $facturaconcepto)
    {
        try{
            $facturaconcepto = FacturaConcepto::findOrFail($facturaconcepto);
            $facturaconcepto->delete();
            return redirect()->route('facturaconcepto.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
