<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Anamnesis;
use App\Persona;
use App\Paciente;
use App\CuestionarioAnamnesis;

class AnamnesisController extends Controller
{
    protected $path = 'anamnesis';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Anamnesis::all();
        return view('pages.'.$this->path.'.index',compact('data'));
    }
    
    public function existeAnamnesis($id){
        $anamnesis = count(Anamnesis::all()->where('paciente_id',$id));
        if ($anamnesis>0){
            return json_encode("si");
        }else{
            return json_encode("no");
        }
        
    }
    
    public function anamnesisPaciente($id){
        $paciente = DB::table('paciente as p')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->select('pe.*','p.*')
        ->where('p.id','=',$id)
        ->orderBy('pe.nombre')
        ->first();
        $cuestionario = CuestionarioAnamnesis::all()->sortBy('orden');
        return view('pages.'.$this->path.'.create',compact('paciente','cuestionario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
