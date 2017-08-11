<?php

namespace App\Http\Controllers;

use App\Factura;
use App\Cobro;
use App\Consulta;
use App\Impuestos;
use App\FacturaConcepto;
use App\FacturaDetalle;
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
    
    
        public function asaniu($factura) {
            
            $id=$factura->id;
            dd($id);
            return $id;
            
        }
    
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
        $factura=Factura::all()->sortByDesc('id')->first();
        if (count($factura)>0){
            $ultimo_nro = ((int)mb_substr($factura->nro,9))+1;
            $cantidad_nro = ((string)strlen($ultimo_nro));
            $nro='';
            for ($cant=$cantidad_nro;$cant<6;$cant++) {
                $nro .='0';
            };
            $ultimo_nro = $nro.$ultimo_nro;    
            $primeros_nros = (mb_substr($factura->nro,0,9));
            $nro_factura = $primeros_nros.$ultimo_nro;
        }
        else {
            $nro_factura = '001-001-0000001';
            $factura= New Factura();
            $factura->timbrado = '';
            $factura->vigencia_timbrado='';
        }
        $fecha=date('Y-m-d');
        $factura_conceptos = FacturaConcepto::all()->sortBy('descripcion');
        $impuestos = Impuestos::all()->sortBy('nombre');
//         DB::table('files')->orderBy('upload_time', 'desc')->first();
//         $cargos = Cargo::all()->sortBy('descripcion');
        return view('pages.'.$this->path.'.create',compact('personas','factura','nro_factura','empleados','factura_conceptos','impuestos','fecha')); 
    }

    public function verificarConsulta(Request $request){
        
        $medico = $request->medico;
        $paciente = $request->paciente;
        $consultas = DB::table('consulta')
        ->join('empleado','consulta.empleado_id','=','empleado.id')
        ->join('persona','empleado.persona_id','=','persona.id')
        ->select('consulta.*','persona.nombre','persona.apellido')
        ->where([['consulta.empleado_id', '=', $medico],['consulta.estado', '=', 'Consulta'],['consulta.paciente_id', '=', $paciente]])
        ->get();
        
        return json_encode($consultas);
    
    }
    public function traerConsulta(Request $request){
        
        $consulta = $request->consulta;
        
        $consultas = DB::table('consulta')
        ->join('agendamiento','consulta.agendamiento_id','=','agendamiento.id')
        ->join('modalidad','agendamiento.modalidad_id','=','modalidad.id')
        ->join('tarifa_hora','tarifa_hora.modalidad_id','=','modalidad.id')
        ->select('consulta.cantidad_horas','tarifa_hora.tarifa as tarifa')
        ->where('consulta.id', '=', $consulta)
        ->get();
        
        return json_encode($consultas);
        
    }
    public function tablaDinamica(Request $request){
        
//         dd($request->cantidad);
        //dd($facturat);
       // $factura->store($request);
        
        return $this->store($request);
        
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
        //        
      
        try {
            /* Primero instanciamos el modelo Factura */
            $estado="Pendiente";
            $factura = new Factura();
            $factura->paciente_id=$request->persona;
            $factura->empleado_id=$request->medico;
            $factura->consulta_id=$request->consulta;
            $factura->monto_total=$request->monto;
            $factura->observacion=$request->observacion;
            $factura->tipo_pago=$request->tipo_pago;
            $factura->nro=$request->nro;
            $factura->fecha=$request->fecha;
            $factura->timbrado=$request->timbrado;
            $factura->estado=$estado;
            $factura->vigencia_timbrado=$request->vigencia_timbrado;

            
           // $detalle =$request->all();
            
            $factura->save();
           $update_consulta = DB::table('consulta')
            ->where('id', $request->consulta)
            ->update(['estado' =>'Facturado' ]);
            /* Guardamos el valor del ID generado para la persona */
            
            $lastInsertedId=$factura->id;
            
            /* Creamos el detalle*/
            
            
            
         $canti=count($request->concepto);
         
//          return json_encode($canti);
         $vari='';
      for ($i = 0; $i < $canti; $i++) {
          
          $factura_detalle = new FacturaDetalle();
          $factura_detalle->factura_cabecera_id=$lastInsertedId;
          foreach ($request->cantidad as $key=>$cantidad)
                {
                    if ($key == $i )
                    {
                            $cant = $cantidad;
                    }
                    
                }
                
                foreach ($request->concepto as $key=>$concepto)
                {
                    if ($key == $i )
                    {
                        $concep = $concepto;
                    }
                    
                }
                foreach ($request->impuesto as $key=>$impuesto)
                {
                    if ($key == $i )
                    {
                        $imp = $impuesto;
                    }
                   
                }
                foreach ($request->monto_total as $key=>$mont)
                {
                    if ($key == $i )
                    {
                        $mon = $mont;
                    }
                    
                }
                $factura_detalle->factura_concepto_id=$concep;
                $factura_detalle->monto=$mon;
                $factura_detalle->cantidad=$cant;
                $factura_detalle->impuesto_id=$impuesto;
//                 dd($lastInsertedId,$roles);
                $factura_detalle->save();
                
                
                

         }     
         if ($factura_detalle){
             return json_encode($factura_detalle);
         
         }
        


            
            
            
        } catch (Exception $e) {
            return "Fatal error - ".$e->getMessage();
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show( $factura)
    {
        //
        $facturas = Factura::findOrFail($factura);
        
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
        $consultas = DB::table('consulta')
        ->join('empleado','consulta.empleado_id','=','empleado.id')
        ->join('persona','empleado.persona_id','=','persona.id')
        ->select('consulta.*','persona.nombre','persona.apellido')
        ->where('consulta.empleado_id', '=',$facturas->empleado_id)
        ->where('consulta.paciente_id', '=',$facturas->paciente_id)
        ->where('consulta.estado' , '=', 'Consulta')
        ->orWhere('consulta.id', '=', $facturas->consulta_id)
        ->get();
        $factura_detalle =   DB::table('factura_detalle as fd')
        ->join('impuesto as i','fd.impuesto_id','=','i.id')
        ->select('fd.*','i.porcentaje as iva','i.porcentaje as porcentaje')
        ->where('fd.factura_cabecera_id', '=',$facturas->id)
        ->get();
        
        foreach ($factura_detalle as $fact){
            $i=1;
            $iva=$fact->iva;
            $monto= $fact->monto / (1 + ($iva * 0.01)) ;
            $mon= $fact->monto - $monto;
            $fact->iva=(int) round($mon);
//             (fd.monto - round((fd.monto/(1+(i.porcentaje*0.01))) ,0))
        }
        
        $factura_conceptos = FacturaConcepto::all()->sortBy('descripcion');
        $impuestos = Impuestos::all()->sortBy('nombre');
        //         DB::table('files')->orderBy('upload_time', 'desc')->first();
        //         $cargos = Cargo::all()->sortBy('descripcion');
        return view('pages.'.$this->path.'.show',compact('personas','facturas','empleados','factura_conceptos','impuestos','consultas','factura_detalle'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit( $factura)
    {
        $facturas = Factura::findOrFail($factura);
       
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
        $consultas = DB::table('consulta')
        ->join('empleado','consulta.empleado_id','=','empleado.id')
        ->join('persona','empleado.persona_id','=','persona.id')
        ->select('consulta.*','persona.nombre','persona.apellido')
        ->where('consulta.empleado_id', '=',$facturas->empleado_id)
        ->where('consulta.paciente_id', '=',$facturas->paciente_id)
        ->where('consulta.estado' , '=', 'Consulta')
        ->orWhere('consulta.id', '=', $facturas->consulta_id)
        ->get();
        
        
        $factura_detalle =   DB::table('factura_detalle')
        ->select('factura_detalle.*')
        ->where('factura_cabecera_id', '=',$facturas->id)
        ->get();
        $factura_conceptos = FacturaConcepto::all()->sortBy('descripcion');
        $impuestos = Impuestos::all()->sortBy('nombre');
        //         DB::table('files')->orderBy('upload_time', 'desc')->first();
        //         $cargos = Cargo::all()->sortBy('descripcion');
        return view('pages.'.$this->path.'.edit',compact('personas','facturas','empleados','factura_conceptos','impuestos','consultas','factura_detalle')); 
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    
    public function tablaDinamicaupdate(Request $request){
        
        //         dd($request->cantidad);
        //dd($facturat);
        // $factura->store($request);
        
        $factura_id=$request->id;
        $factura = Factura::findOrFail($factura_id);
       
        return $this->update($request , $factura);
        
    }
    
    
    
  
    public function update($request,  $factura)
    {
        //
        
        try {
            /* Primero instanciamos el modelo Factura */
            $factura->estado="Pendiente";
            $factura->paciente_id=$request->persona;
            $factura->empleado_id=$request->medico;
            $factura->consulta_id=$request->consulta;
            $factura->monto_total=$request->monto;
            $factura->observacion=$request->observacion;
            $factura->tipo_pago=$request->tipo_pago;
            $factura->nro=$request->nro;
            $factura->fecha=$request->fecha;
            $factura->timbrado=$request->timbrado;
            
            $factura->vigencia_timbrado=$request->vigencia_timbrado;
            
            
            // $detalle =$request->all();
            
            $factura->save();
            
            /* Guardamos el valor del ID generado para la persona */
            
            $lastInsertedId=$factura->id;
            
            /* Creamos el detalle*/
            
            
            $factura->facturadetalle()->delete();
            $canti=count($request->concepto);
            //          return json_encode($canti);
            $vari='';
            for ($i = 0; $i < $canti; $i++) {
                $factura_detalle = new FacturaDetalle();
                $factura_detalle->factura_cabecera_id=$lastInsertedId;
                foreach ($request->cantidad as $key=>$cantidad)
                {
                    if ($key == $i )
                    {
                        $cant = $cantidad;
                    }
                    
                }
                
                foreach ($request->concepto as $key=>$concepto)
                {
                    if ($key == $i )
                    {
                        $concep = $concepto;
                    }
                    
                }
                foreach ($request->impuesto as $key=>$impuesto)
                {
                    if ($key == $i )
                    {
                        $imp = $impuesto;
                    }
                    
                }
                foreach ($request->monto_total as $key=>$mont)
                {
                    if ($key == $i )
                    {
                        $mon = $mont;
                    }
                    
                }
                $factura_detalle->factura_concepto_id=$concep;
                $factura_detalle->monto=$mon;
                $factura_detalle->cantidad=$cant;
                $factura_detalle->impuesto_id=$impuesto;
                //dd($lastInsertedId,$roles);
                $factura_detalle->save();
                
                
                
                
            }
            return json_encode($factura_detalle);
            
            
            
            
            
        } catch (Exception $e) {
            return "Fatal error - ".$e->getMessage();
        }
        

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy( $factura)
    {
        //
        try{
            $factura = Factura::findOrFail($factura);
            $consulta= $factura->consulta_id;
            $id=$factura->id;
//             $factura_detalle = FacturaDetalle::where('factura_cabecera_id', '=', $id);
            $factura->estado='Anulada';
            $factura->cobro()->delete();
            $factura->save();
            $update_consulta = DB::table('consulta')
            ->where('id', $consulta)
            ->update(['estado' =>'Consulta' ]);
            
            return redirect()->route('factura.index');
        } catch(Exception $e){
            $var = '<script language="javascript">alert("No se puede eliminar este registro ya que tiene registros hijos asociados a otras tablas."); window.history.go(-1);</script>';
            return ("$var ");
        }
    }
}
