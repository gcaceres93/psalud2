<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;

use App\Rol;
use App\Persona;
use App\Empleado;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function index()
    {
        $data= User::all()->sortBy('id');
        return view('pages.user.index',compact('data'));
    }
    
    
    public function traerDatos(Request $request)
    {
        $persona=DB::table('persona')
        ->select('persona.*')
        ->where('persona.id','=',$request->persona)
        ->get();
        
        return json_encode($persona);
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     
    protected $redirectTo = '/home'; */

    public function store(Request $request)
    {
       
        try{
            
            $usuarios=DB::table('users')
            ->select('users.*')
            ->where('users.email','=',$request->email)
            ->get();
            $usu=count($usuarios);
            if ($usu>0){
                $var = '<script language="javascript">alert("El email ya cuenta con usuario"); window.history.go(-1);</script>'; 
                return ("$var ");
            }
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->empleado_id = $request->persona;
            $roles = $request->roles;
            $user->save();
            
            $lastInsertedId=$user->id;
            
            foreach ($request->roles as $rol )
           
            {
                
            //dd($lastInsertedId,$roles);
                $user->roles()->attach($lastInsertedId,['rol_id' => $rol]);
            }

         
//             $user->roles()->attach($lastInsertedId, $roles );
            
            
            
            
            $user->save();
           
            
            
            return redirect()->route('user.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

     public function edit( $user)
    {
//          $user = User::findOrFail($user);
//         return view('pages.user.edit',compact('user'));
        $user = User::findOrFail($user);
//         $personas = Empleado::where('es_medico','true')->get();
//         $personas = $personas->sortBy('persona_id->nombre');
        $personas=DB::table('empleado')
        ->join('persona','empleado.persona_id','=','persona.id')
        ->select('empleado.*','persona.nombre','persona.apellido')
        ->where('es_medico','=',true)
        ->groupBy('persona.apellido','persona.nombre','empleado.id')
        ->orderBy('persona.apellido')
        ->get();
        //return view('pages.user.create',compact('personas'));
        $roles = Rol::all()->sortBy('nombre');
        
        $roles_list = User::with('roles')->where('id', $user->id)->get();
        
//         $emp=DB::table('empleado')
//         ->join('persona','empleado.persona_id','=','persona.id')
//         ->select('empleado.*','persona.nombre','persona.apellido')->orderBy('persona.apellido')
//         ->where('empleado.id','=',$user->empleado_id)
//         ->first();
          
        
        return view('pages.user.edit',compact('user','roles','personas','roles_list'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('guest');
    } */

    public function update(Request $request, $user)
    {
        $user = User::findOrFail($user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->empleado_id = $request->persona;
        $id=$user->id;
        $rol = $request->lista;
        $user->roles()->sync($rol,$id);
        
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cargos  $cargos
     * @return \Illuminate\Http\Response
     */
    public function destroy( $user)
    {
         try{
            $user = User::findOrFail($user);
            $id=$user->id;
//             $user->roles()->detach();
            $user->delete();
            
            return redirect()->route('user.index');
        } catch(Exception $e){
            $var = '<script language="javascript">alert("No se puede eliminar este registro ya que tiene registros hijos asociados a otras tablas."); window.history.go(-1);</script>';
            return ("$var ");
//             return "Fatal error - ".$e->getMessage();
        }
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
  /*  protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    } */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create()
    {
        /* return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]); */
        $personas=DB::table('empleado')
        ->join('persona','empleado.persona_id','=','persona.id')
        ->select('empleado.*','persona.nombre','persona.apellido')
        ->where('es_medico','=',true)
        ->groupBy('persona.apellido','persona.nombre','empleado.id')
        ->orderBy('persona.apellido')
        ->get();
//         $roles_list = User::with('roles')->where('id', $user->id)->get();
        
        //return view('pages.user.create',compact('personas'));
        $roles = Rol::all()->sortBy('nombre');
        return view('pages.user.create',compact('roles','personas'));
    }
}
