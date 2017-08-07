<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Anamnesis;
use App\Paciente;
use App\Persona;
use Exception;
use App\TipoFamiliar;
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
        
        $data=Paciente::select(DB::raw('paciente.*,persona.nombre,persona.apellido'))
        ->join('persona','paciente.persona_id','=','persona.id')
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
        $personas = Persona::all()->sortBy('apellido');
        $tipos = TipoFamiliar::all()->sortBy('nombre');
        return view('pages.'.$this->path.'.create',compact('personas','tipos'));
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
            $persona->save();
            
            /* Guardamos el valor del ID generado para la persona */
            
            $personaId=$persona->id;
            
            /* Creamos el empleado */
            
            $paciente = new Paciente();
            $paciente->ruc=$request->ruc;
            $paciente->razon_social=$request->razon_social;
            $paciente->persona_id=$personaId;
            $paciente->save();
            
            $pacienteId=$paciente->id;
            $canti=count($request->personas);
//             return json_encode($canti);
            $vari='';
            for ($i = 0; $i < $canti; $i++) {
               
                foreach ($request->personas as $key=>$persona)
                {
                    if ($key == $i )
                    {
                        $per = $persona;
                    }
                    
                }
                
                foreach ($request->tipos as $key=>$tipo)
                {
                    if ($key == $i )
                    {
                        $tip = $tipo;
                    }
                    
                }
                $paciente->tipoFamiliares()->attach($pacienteId,['persona_id' => $per,'tipo_familiar_id'=>$tip]);
                
            } 
            
            
            return json_encode($paciente);
            //return redirect()->route('paciente.index');
            
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
        $familiares = DB::table('familiar_por_paciente as fp')
        ->join('paciente as p','fp.paciente_id','=','p.id')
        ->join('persona as ppaciente','p.persona_id','=','ppaciente.id')
        ->join('persona as familiar','fp.persona_id','familiar.id')
        ->join('tipo_familiar as t','fp.tipo_familiar_id','t.id')
        ->select('familiar.nombre as nombre','familiar.apellido as apellido','t.nombre as tipo')
        ->where('p.id','=',$id)
            ->orderBy('nombre')
            ->get();
        $anamnesis = Anamnesis::where('paciente_id',$id)->first();
        return view('pages.'.$this->path.'.show',compact('paciente','familiares','anamnesis'));
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
        $familiares = DB::table('familiar_por_paciente as fp')->join('persona as pe','fp.persona_id','=','pe.id')->join('tipo_familiar as tf','fp.tipo_familiar_id','=','tf.id')->select('pe.*','tf.nombre as tipo','tf.id as tipoId')->where('fp.paciente_id','=',$id)
        ->orderBy('pe.nombre')
        ->get();
        $personas = Persona::all()->sortBy('apellido');
        $tipos = TipoFamiliar::all()->sortBy('nombre');
        return view('pages.'.$this->path.'.edit',compact('paciente','familiares','personas','tipos'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizarPaciente(Request $request){
        $paciente_id=$request->id;
        $paciente = Paciente::findOrFail($paciente_id);
        
        return $this->update($request , $paciente);
    }
    
    public function update($request, $paciente)
    {
        $persona = Persona::findOrFail($paciente->persona->id);
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
        $persona->save();
        $paciente->ruc=$request->ruc;
        $paciente->razon_social=$request->razon_social;
        $paciente->save();
        
       
        $pacienteId=$paciente->id;
        $canti=count($request->personas);
        //             return json_encode($canti);
        $vari='';
        for ($i = 0; $i < $canti; $i++) {
            
            foreach ($request->personas as $key=>$persona)
            {
                if ($key == $i )
                {
                    $per = $persona;
                }
                
            }
            
            foreach ($request->tipos as $key=>$tipo)
            {
                if ($key == $i )
                {
                    $tip = $tipo;
                }
                
            }
            $paciente->tipoFamiliares()->sync([$pacienteId,$tip,$per]);
            
        }
        
        
        return json_encode($paciente);
        //return redirect()->route('paciente.index');
        
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
                $paciente = Paciente::findOrFail($id);
                $paciente->delete();
                return redirect()->route($this->path.'.index');
            } catch(Exception $e){
                return "Fatal error - ".$e->getMessage();
            }
        }
}
