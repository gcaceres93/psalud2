<?php

namespace App\Http\Controllers;

use App\Cobro;
use Illuminate\Http\Request;
use App\Factura;
use Illuminate\Support\Facades\DB;
use Exception;

class CobroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//         $data= Cobro::all()->sortBy('id');
        
        $data = DB::table('cobro as c')
        ->join('factura_cabecera as f','f.id','=','c.factura_id')
        ->join('paciente as p','p.id','=','f.paciente_id')
        ->select('c.*','f.nro','p.razon_social','p.ruc')
            ->get();
        
        return view('pages.cobro.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Factura $factura)
    {
        //
//         $Factura = New Factura();
//         $roles_list = User::with('roles')->where('id', $user->id)->get();
//         $facturass = Factura::with('cobro')->get();
//         $id=$Factura->asaniu($factura)->get();
       // $facturas = Factura::findOrFail($factura);
//         $facturas = $factura->all();
//         $facturass = Factura::findOrFail($factura->all());
        
//         $facturass = ($factura->all());
        $facutra= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $pos = strpos($facutra, '?') +1;
        $ids=substr($facutra, $pos);
        
        $facturas = Factura::findOrFail($ids);
       // dd($facturas);
//         foreach ($factura as $factur){
//              $asd = $factur->attributes;
           
//         }
 
        
        
//         dd($asd->id);
//          $asd = $asd->all();
//         foreach ($asd as $fact){
//             $asa = $fact->id;
           
            
//         }
        
        return view('pages.cobro.create',compact('facturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $cobros = new Cobro();
            $cobros->tipo_pago = $request->tipo_pago;
            $cobros->monto = $request->monto_a_cobrar;
            $cobros->factura_id = $request->factura;
            $cobros->observacion = $request->observacion;
            $cobros->save();
            $update_factura = DB::table('factura_cabecera')
            ->where('id', $request->factura)
            ->update(['estado' =>'Cobrado' ]);
            return redirect()->route('cobro.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function show($cobro)
    {
        //
        $cob = DB::table('cobro')
        ->join('factura_cabecera','cobro.factura_id','=','factura_cabecera.id')
        ->select('cobro.*','factura_cabecera.nro')
        ->where('cobro.id','=',$cobro)
        ->get();
        
        foreach ($cob as $cobro){
            $cobros=$cobro;
            
        }
        //         dd($cobros->all());
        return view('pages.cobro.show',compact('cobros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function edit( $cobro)
    {
//         $cob = Cobro::findOrFail($cobro);
//         dd($cobro);
//         $cobros = Cobro::findOrFail($cobro);
        $cob = DB::table('cobro')
        ->join('factura_cabecera','cobro.factura_id','=','factura_cabecera.id')
        ->select('cobro.*','factura_cabecera.nro')
        ->where('cobro.id','=',$cobro)
        ->get();
        
        foreach ($cob as $cobro){
            $cobros=$cobro;
            
        }
//         dd($cobros->all());
        return view('pages.cobro.edit',compact('cobros'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        try{
        $cobro = Cobro::findOrfail($id);
        $cobro->factura_id=$request->factura_id;
        $cobro->tipo_pago=$request->tipo_pago;
        $cobro->monto=$request->monto_a_cobrar;
        $cobro->observacion=$request->observacion;
        $cobro->save();
        return redirect()->route('cobro.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function destroy( $cobro)
    {
        //
        try{
            $cobros = Cobro::findOrFail($cobro);
            $id_factura =$cobros->factura_id;
            $cobros->delete();
            $update_factura = DB::table('factura_cabecera')
            ->where('id', $id_factura)
            ->update(['estado' =>'Pendiente' ]);
            return redirect()->route('cobro.index');
        } catch(Exception $e){
            $var = '<script language="javascript">alert("No se puede eliminar este registro ya que tiene registros hijos asociados a otras tablas."); window.history.go(-1);</script>';
            return ("$var ");
//             return "Fatal error - ".$e->getMessage();
        }
    }
}
