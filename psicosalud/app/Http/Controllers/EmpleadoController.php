<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Empleado;
use App\Cargo;
use App\Persona;
class EmpleadoController extends Controller
{
    private $path = 'empleado';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Empleado::select(DB::raw('empleado.*,persona.nombre,persona.apellido'))
        ->join('persona','empleado.persona_id','=','persona.id')
        ->orderBy('persona.apellido')
        ->get();
        
        return view('pages.'.$this->path.'.index',compact('data'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::all()->sortBy('descripcion');
        return view('pages.'.$this->path.'.create',compact('cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function getMedicos()
    {
        $data = Empleado::where('es_medico','true')->get();
        return view('pages.'.$this->path.'.index',compact('data'));
    }

    public function createMedico()
    {
        $profesionales_salud = Cargo::where('profesional_salud','=',true)->get();

        return view('pages.'.$this->path.'.create',compact('profesionales_salud'));
    }

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

            $empleado = new Empleado();
            $empleado->codigo=$request->codigo;
            $empleado->cargo_id=$request->cargo;
            $empleado->persona_id=$lastInsertedId;
            $empleado->disponibilidad_desde=$request->disponibilidad_desde;
            $empleado->disponibilidad_hasta=$request->disponibilidad_hasta;

            if ($request['es_medico']){
                $empleado->es_medico=true;
            }else{
                $empleado->es_medico=false;
            }

            $empleado->save();

            if ($empleado -> es_medico){
                return redirect()->route('medico.index');
            }else{
                return redirect()->route('empleado.index');
            }
            
            
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
        $empleado = Empleado::findOrFail($id);
        $cargos = Cargo::all()->sortBy('descripcion');
        return view('pages.'.$this->path.'.show',compact('empleado','cargos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $cargos = Cargo::all()->sortBy('descripcion');
        return view('pages.'.$this->path.'.edit',compact('empleado','cargos'));
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

        $empleado = Empleado::findOrFail($id);
        $persona = Persona::findOrFail($empleado->persona->id);
        $persona->nombre=$request->nombre;
        $persona->apellido=$request->apellido;
        $persona->nacimiento=$request->nacimiento;
        $persona->email=$request->email;
        $persona->telefono=$request->telefono;
        $persona->cedula=$request->cedula;
        $persona->direccion=$request->direccion;
        $persona->save();
        $empleado->codigo=$request->codigo;
        $empleado->cargo_id=$request->cargo;
        $empleado->disponibilidad_desde=$request->disponibilidad_desde;
        $empleado->disponibilidad_hasta=$request->disponibilidad_hasta;
        if ($request['es_medico']){
            $empleado->es_medico=true;
        }else{
            $empleado->es_medico=false;
        }
        $empleado->save();
        if ($empleado -> es_medico){
                return redirect()->route('medico.index');
            }else{
                return redirect()->route('empleado.index');
        } 
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
            $empleado = Empleado::findOrFail($id);
            $empleado->delete();
            if ($empleado -> es_medico){
                return redirect()->route('medico.index');
            }else{
                return redirect()->route('empleado.index');
            }
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
