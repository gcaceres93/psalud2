<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Exception;

use App\TipoTerapia;
class TipoTerapiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TipoTerapia::all()->sortBy('id');
        return view('pages.tipoTerapia.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.tipoTerapia.create');    
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
            $tipoTerapia = new TipoTerapia();
            $tipoTerapia->nombre=$request->nombre;
            $tipoTerapia->save();
            return redirect()->route('tipoTerapia.index');     
        } catch (Exception $e) {
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
        $tipoTerapia = TipoTerapia::findOrFail($id);
        return view('pages.tipoTerapia.edit',compact('tipoTerapia'));
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
        $tipoTerapia = TipoTerapia::findOrFail($id);
        $tipoTerapia->nombre = $request->nombre;
        $tipoTerapia->save();
        return redirect()->route('tipoTerapia.index');
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
            $tipoTerapia = TipoTerapia::findOrFail($id);
            $tipoTerapia->delete();
            return redirect()->route('tipoTerapia.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
