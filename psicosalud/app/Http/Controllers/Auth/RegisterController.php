<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Exception;

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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     
    protected $redirectTo = '/home'; */

    public function store(Request $request)
    {
        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('user.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

     public function edit( $user)
    {
         $user = User::findOrFail($user);
        return view('pages.user.edit',compact('user'));
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
            $user->delete();
            return redirect()->route('user.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
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
        return view('pages.user.create');
    }
}
