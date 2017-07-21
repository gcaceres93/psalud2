<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Persona;
use Exception;
class PacienteController extends Controller
{
    protected $path = 'paciente';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Paciente::all()->sortBy('id');
        return view('pages.'.$this->path.'.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.'.$this->path.'.create');
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
            /* Primero instanciamos el modelo persona */

            $persona = new Persona();
            $persona->nombre=$request->nombre;
            $persona->apellido=$request->apellido;
            $persona->nacimiento=$request->nacimiento;
            $persona->email=$request->email;
            $persona->telefono=$request->telefono;
            $persona->cedula=$request->cedula;
            $persona->direccion=$request->direccion;
            $persona->save();

            /* Guardamos el valor del ID generado para la persona */

            $lastInsertedId=$persona->id;

            /* Creamos el empleado */

            $paciente = new Paciente();
            $paciente->ruc=$request->ruc;
            $paciente->razon_social=$request->razon_social;
            $paciente->persona_id=$lastInsertedId;
            $paciente->save();
            return redirect()->route('paciente.index');
            
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
        $paciente = Paciente::findOrFail($id);
        return view('pages.'.$this->path.'.show',compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pages.'.$this->path.'.edit',compact('paciente'));
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
        $paciente = Paciente::findOrFail($id);
        $persona = Persona::findOrFail($paciente->persona->id);
        $persona->nombre=$request->nombre;
        $persona->apellido=$request->apellido;
        $persona->nacimiento=$request->nacimiento;
        $persona->email=$request->email;
        $persona->telefono=$request->telefono;
        $persona->cedula=$request->cedula;
        $persona->direccion=$request->direccion;
        $persona->save();
        $paciente->ruc=$request->ruc;
        $paciente->razon_social=$request->razon_social;
        $paciente->save();
        return redirect()->route($this->path.'.index');     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         try{
            $paciente = Paciente::findOrFail($id);
            $paciente->delete();
            return redirect()->route($this->path.'.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
