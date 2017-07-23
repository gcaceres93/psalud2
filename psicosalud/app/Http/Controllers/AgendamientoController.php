<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Agendamiento;
use App\Paciente;
use App\Modalidad;
use App\Sucursal;

class AgendamientoController extends Controller
{
    protected $path = 'agendamiento';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Agendamiento::all()->sortBy('fecha_programada');
        return view('pages.'.$this->path.'.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pacientes=DB::table('paciente')
        ->join('persona','paciente.persona_id','=','persona.id')
        ->select('paciente.*','persona.nombre','persona.apellido')->orderBy('persona.apellido')
        ->get();
        $modalidades=Modalidad::all()->sortBy('descripcion');
        $sucursales=Sucursal::all()->sortBy('nombre');
        return view('pages.'.$this->path.'.create',compact('pacientes','modalidades','sucursales'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
