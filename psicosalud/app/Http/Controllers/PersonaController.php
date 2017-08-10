<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Persona;
use App\Ocupacion;

class PersonaController extends Controller
{

    private $path = 'persona';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Persona::all()->sortBy('apellido');
        return view('pages.'.$this->path.'.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ocupaciones=Ocupacion::all()->sortBy('nombre');
        return view('pages.'.$this->path.'.create',compact('ocupaciones'));
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
            $persona->colegio=$request->colegio;
            $persona->grado=$request->grado;
            $persona->lugar_nacimiento=$request->lugar_nacimiento;
            $persona->ocupacion_id=$request->ocupacion;
            
            $persona->save();
            return redirect()->route('persona.index');
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
        $persona = Persona::findOrFail($id);
        
        return view('pages.'.$this->path.'.show',compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ocupaciones=Ocupacion::all()->sortBy('nombre');
        $persona = Persona::findOrFail($id);
        return view('pages.'.$this->path.'.edit',compact('persona','ocupaciones'));
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
        $persona = Persona::findOrFail($id);
        $persona->nombre=$request->nombre;
        $persona->apellido=$request->apellido;
        $persona->nacimiento=$request->nacimiento;
        $persona->email=$request->email;
        $persona->telefono=$request->telefono;
        $persona->cedula=$request->cedula;
        $persona->direccion=$request->direccion;
        $persona->colegio=$request->colegio;
        $persona->grado=$request->grado;
        $persona->lugar_nacimiento=$request->lugar_nacimiento;
        $persona->ocupacion_id=$request->ocupacion;
        
        $persona->save();
        return redirect()->route('persona.index');
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
            $persona = Persona::findOrFail($id);
            $persona->delete();
            return redirect()->route($this->path.'.index');
        } catch(Exception $e){
            $var = '<script language="javascript">alert("No se puede eliminar este registro ya que tiene registros hijos asociados a otras tablas."); window.history.go(-1);</script>';
            return ("$var ");
//             return "Fatal error - ".$e->getMessage();
        }
    }
}
