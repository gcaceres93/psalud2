<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use JasperPHP\JasperPHP as JasperPHP;
use App\Anamnesis;
use App\Persona;
use App\Paciente;
use App\CuestionarioAnamnesis;
use App\Consulta;
use App\RespuestaCuestionario;

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
        $data = DB::table('anamnesis as a')
        ->join('paciente as p','a.paciente_id','=','p.id')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->select('pe.*','a.*')
        ->orderBy('pe.nombre')
        ->get();
        
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
    
    public function imprimirAnamnesis($id){
        $jasper = new JasperPHP;
        $dir_jasper = base_path() . '/resources/jasper/anamnesis.jasper';
        $dir_pdf = base_path() . '/resources/jasper/anamnesis.pdf';
        
        $jasper->process(
            $dir_jasper,
            false,
            array("pdf"),
            array("id"=>$id),
            array(
                'password'=> 'postgres',
                'driver' => 'postgres',
                'username' => 'postgres',
                'host' => 'localhost',
                'database' => 'psicosalud',
                'port' => '5432',
            )
            )->execute();
            
            
            return response()->download($dir_pdf);
    }
    
    public function anamnesisPaciente($id){
        $paciente = DB::table('paciente as p')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->select('pe.*','p.*')
        ->where('p.id','=',$id)
        ->orderBy('pe.nombre')
        ->first();
        $cuestionario = CuestionarioAnamnesis::all()->sortBy('orden');
       // $consulta = Consulta::where('paciente_id',)
        return view('pages.'.$this->path.'.create_paciente',compact('paciente','cuestionario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function create()
    {
        $cuestionario = CuestionarioAnamnesis::all()->sortBy('orden');
        $pacientes = DB::table('paciente as p')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->select('pe.*','p.*')
        ->orderBy('pe.nombre')
        ->get();
        // $consulta = Consulta::where('paciente_id',)
        return view('pages.'.$this->path.'.create',compact('cuestionario','pacientes'));
    }

    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anamnesis = new Anamnesis();
        $anamnesis->paciente_id=$request->paciente;
        $anamnesis->observacion=$request->observacion;
        $anamnesis->motivo=$request->motivo_consulta;
        $anamnesis->informantes=$request->informantes;
        $anamnesis->save();
        
        $i = 0;
        $cuestionarios = CuestionarioAnamnesis::all()->sortBy('orden');
        foreach ($cuestionarios as $cuestionario){
            $i++;
            $respuesta = 'cuestionario'.(string)$i;
            $respuestaCuestionario = new RespuestaCuestionario();
            $respuestaCuestionario->anamnesis_id = $anamnesis->id;
            $respuestaCuestionario->cuestionario_anamnesis_id = $cuestionario->id;
            $respuestaCuestionario->respuesta = $request->$respuesta;
            $respuestaCuestionario->save();
        }
        return redirect()->route('anamnesis.show',$anamnesis->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $anamnesis = Anamnesis::findOrFail($id);
        $paciente = DB::table('paciente as p')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->select('pe.*','p.*')
        ->where('p.id','=',$anamnesis->paciente_id)
        ->orderBy('pe.nombre')
        ->first();
        $respuestas = DB::table('respuesta_cuestionario as rc')
        ->join('cuestionario_anamnesis as ca','rc.cuestionario_anamnesis_id','=','ca.id')
        ->join('anamnesis as a','rc.anamnesis_id','=','a.id')
        ->select('rc.*','ca.*')
        ->where('a.id','=',$id)
        ->orderBy('ca.orden')
        ->get();
        $diagnostico=DB::table('diagnostico as d')
        ->select('d.id')
        ->where('d.anamnesis_id','=',$id)
        ->first();
        
        return view('pages.'.$this->path.'.show',compact('anamnesis','paciente','respuestas','diagnostico'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anamnesis = Anamnesis::findOrFail($id);
        $paciente = DB::table('paciente as p')
        ->join('persona as pe','p.persona_id','=','pe.id')
        ->select('pe.*','p.*')
        ->where('p.id','=',$anamnesis->paciente_id)
        ->orderBy('pe.nombre')
        ->first();
        $respuestas = DB::table('respuesta_cuestionario as rc')
        ->join('cuestionario_anamnesis as ca','rc.cuestionario_anamnesis_id','=','ca.id')
        ->join('anamnesis as a','rc.anamnesis_id','=','a.id')
        ->select('rc.*','ca.*')
        ->where('a.id','=',$id)
        ->orderBy('ca.orden')
        ->get();
        return view('pages.'.$this->path.'.edit',compact('anamnesis','paciente','respuestas'));
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
        try {
            $anamnesis = Anamnesis::findOrFail($id);
            $anamnesis->paciente_id=$request->paciente_id;
            $anamnesis->observacion=$request->observacion;
            $anamnesis->motivo=$request->motivo_consulta;
            $anamnesis->informantes=$request->informantes;
            $anamnesis->save();
            
            $i = 0;
            $cuestionarios = CuestionarioAnamnesis::all()->sortBy('orden');
            foreach ($cuestionarios as $cuestionario){
                $i++;
                $respuesta = 'cuestionario'.(string)$i;
                $respuestaCuestionario = new RespuestaCuestionario();
                $respuestaCuestionario->anamnesis_id = $anamnesis->id;
                $respuestaCuestionario->cuestionario_anamnesis_id = $cuestionario->id;
                $respuestaCuestionario->respuesta = $request->$respuesta;
                $respuestaCuestionario->save();
            }
           return redirect()->route('anamnesis.show',$anamnesis->id);
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
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
            $anamnesis = Anamnesis::findOrFail($id);
            $anamnesis->delete();
            return redirect()->route('anamnesis.index');
        } catch(Exception $e){
            $var = '<script language="javascript">alert("No se puede eliminar este registro ya que tiene registros hijos"); window.history.go(-1);</script>';
            return ("$var ");
//             return "Fatal error - ".$e->getMessage();
        }
    }
}
