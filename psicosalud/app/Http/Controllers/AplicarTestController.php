<?php

namespace App\Http\Controllers;

use App\AplicarTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;


class AplicarTestController extends Controller
{
    protected $path = 'aplicarTest';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data= AplicarTest::all()->sortBy('id');
        return view('pages.'.$this->path.'.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $personas=DB::table('paciente')
        ->join('persona','paciente.persona_id','=','persona.id')
        ->select('paciente.*','persona.nombre','persona.apellido')
        ->groupBy('persona.apellido','persona.nombre','paciente.id')
        ->orderBy('persona.apellido')
        ->get();
        
        $test=DB::table('test')
        ->select('test.*')
        ->get();
        
        
        return view('pages.'.$this->path.'.index',compact('personas,test'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AplicarTest  $aplicarTest
     * @return \Illuminate\Http\Response
     */
    public function show(AplicarTest $aplicarTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AplicarTest  $aplicarTest
     * @return \Illuminate\Http\Response
     */
    public function edit(AplicarTest $aplicarTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AplicarTest  $aplicarTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AplicarTest $aplicarTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AplicarTest  $aplicarTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(AplicarTest $aplicarTest)
    {
        //
    }
}
