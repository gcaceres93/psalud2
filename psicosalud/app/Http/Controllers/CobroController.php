<?php

namespace App\Http\Controllers;

use App\Cobro;
use Illuminate\Http\Request;
use App\Factura;

class CobroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data= Cobro::all()->sortBy('id');
        return view('pages.cobro.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Factura $factura)
    {
        //
//         $Factura = New Factura();
//         $roles_list = User::with('roles')->where('id', $user->id)->get();
//         $id=$Factura->asaniu($factura)->get();
//         $facturas = Factura::findOrFail($factura);
        
        
        return view('pages.cobro.create');
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
            $cobros = new Cobro();
            $cobros->tipo_pago = $request->tipo_pago;
            $cobros->monto = $request->monto_a_cobrar;
            $cobros->observacion = $request->observacion;
            $cobros->save();
            return redirect()->route('cobro.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function show($cobro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function edit( $cobro)
    {
        $cobros = Cobro::findOrFail($cobro);
        return view('pages.cobro.edit',compact('cobros'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $cobro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function destroy( $cobro)
    {
        //
        try{
            $cobros = Cobro::findOrFail($cobro);
            $cobros->delete();
            return redirect()->route('cobro.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
