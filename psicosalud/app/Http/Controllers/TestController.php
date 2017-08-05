<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private $path = 'test';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $data = Test::all()->sortBy('id');
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
       # $data = Empleado::where('es_medico','true')->get();
        #$modalidades = Modalidad::all();
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
        //
        
        if ($request->abstracto == True){
            $abst=True;
        }
        else {
            $abst=False;
        }
        try{
            $test = new Test();
            $test->nombre = $request->nombre;
            $test->abstracto =$abst;
            $test->save();
            return redirect()->route('test.index');
        }catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit( $test)
    {
        //
        
       
        $test = Test::findOrFail($test);
       
        
        return view('pages.'.$this->path.'.edit',compact('test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $test)
    {
        //
        if ($request->abstracto == True){
            $abst=True;
        }
        else {
            $abst=False;
        }
        $test = Test::findOrFail($test);
        $test->nombre = $request->nombre;
        $test->abstracto = $abst;
        
        $test->save();
        
        return redirect()->route('test.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy( $test)
    {
        //
        try{
            $test = Test::findOrFail($test);
            $test->delete();
            return redirect()->route('test.index');
        } catch(Exception $e){
            return "Fatal error - ".$e->getMessage();
        }
    }
}
