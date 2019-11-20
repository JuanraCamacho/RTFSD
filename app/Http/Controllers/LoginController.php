<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(/*$nombre*/)
    {
        session(['UserData' => array(['Usuario' => ""])]);
        return view('Login.login2');// compact('nombre'));
    }

    public function register(){
        return view('Login.Registro');
    }

    public function verificarUsuario(Request $request){
        $usuario = $request->get('user');
        $pass = $request->get('pass');
        $sql = "call SP_Login (
            '".$usuario."',
            '".$pass."'
        )";
        $datos = DB::select($sql,array(1,10));
        
        if($datos==null){
                return Redirect::to('/')->withErrors(['errors'=> 'Error']);
        }
        else{ 
            //dd($datos);  
            session(['UserData' => array(['Usuario' => $datos[0]->Usuario])]);
            return Redirect::to('/administrador/areas');
        }
    }

    public function registrarUsuario(Request $request){
        
        $Opcion = 1;
        $IdOpcion = 1;
        $Nombre = $request->get('nombre');
        $Usuario = $request->get('usuario');
        $Pass = $request->get('pass');
        $sql = "call SP_AC_Usuario (
            '".$Opcion."',
            '".$Nombre."',
            '".$Usuario."',
            '".$Pass."',
            '".$IdOpcion."'
        )";
        
        $datos = DB::select($sql,array(1,10));
           // dd($datos[0]->resultado);
        if($datos==null){
                return Redirect::to('/registrarse')->withErrors(['errors'=> 'Error']);
        }
        if($datos[0]->resultado==0){
            return Redirect::to('/registrarse')->withErrors(['errors'=> 'Complete los campos']);
        }
        else{
            session(['UserData' => array(['Usuario' => $datos[0]->Usuario])]);
            return Redirect::to('/administrador/areas');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return ('create');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
