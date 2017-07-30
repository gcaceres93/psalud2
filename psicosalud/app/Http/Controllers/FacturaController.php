<?php

namespace App\Http\Controllers;

use App\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class FacturaController extends Controller
{
    private $path = 'factura';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //
        
        $data=Factura::select(DB::raw('factura_cabecera.*,persona.nombre as nombre,persona.apellido as apellido,paciente.razon_social,paciente.ruc'))
        ->join('paciente','paciente.id','=','factura_cabecera.paciente_id')
        ->join('persona','persona.id','=','paciente.persona_id')
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
        //
        $personas=DB::table('paciente')
        ->join('persona','paciente.persona_id','=','persona.id')
        ->select('paciente.*','persona.nombre','persona.apellido')
        ->groupBy('persona.apellido','persona.nombre','paciente.id')
        ->orderBy('persona.apellido')
        ->get();
        $empleados=DB::table('empleado')
        ->join('persona','empleado.persona_id','=','persona.id')
        ->select('empleado.*','persona.nombre','persona.apellido')
        ->where('es_medico','=',true)
        ->groupBy('persona.apellido','persona.nombre','empleado.id')
        ->orderBy('persona.apellido')
        ->get();
        $factura=Factura::all()->sortBy('id')->first();
        $ultimo_nro = ((int)mb_substr($factura->nro,9))+1;
        $cantidad_nro = ((string)strlen($ultimo_nro));
        $nro='';
        for ($cant=$cantidad_nro;$cant<6;$cant++) {
            $nro .='0';
        };
        $ultimo_nro = $nro.$ultimo_nro;    
        $primeros_nros = (mb_substr($factura->nro,0,9));
        $nro_factura = $primeros_nros.$ultimo_nro;
//         DB::table('files')->orderBy('upload_time', 'desc')->first();
//         $cargos = Cargo::all()->sortBy('descripcion');
        return view('pages.'.$this->path.'.create',compact('personas','factura','nro_factura','empleados'));
    }

    public function verificarConsulta(Request $request){
        
        $medico = $request->medico;
        
        $consultas = DB::table('consulta')
        ->join('empleado','consulta.empleado_id','=','empleado.id')
        ->join('persona','empleado.persona_id','=','persona.id')
        ->select('consulta.*','persona.nombre','persona.apellido')
        ->where([['consulta.empleado_id', '=', $medico],['consulta.estado', '=', 'consulta']])
        ->get();
        
        return json_encode($consultas);
    
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
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }
}
