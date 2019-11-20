<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Post;
use DB;

class RecursosController extends Controller
{
    /**     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idTema)
    {
        if(Self::validarSiUsuarioActivo()){
            $IdTema2 = (int)$idTema; 
            $sql = "call Get_Recurso ('".$IdTema2 ."')";
            $recursos = DB::select($sql,array(1,100));
            // dd($recursos);
            return view('Admin.Recursos.index',compact('recursos','IdTema2'));
        } 
        else{
            return Redirect::to('/login2');
        }
        
    }
   
    public function validarSiUsuarioActivo(){
        $info;
        if(session()->has('UserData')){
            $info = DB::table('tblusuario')
            ->where('Usuario',session('UserData')[0]['Usuario'])
            ->first();
            if($info == null){
                return false;
            }else{
                return true;
            }
        } else{
            return false;
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idTema2)
    {
        $idTema = (int) $idTema2;
        
        return view ('Admin.Recursos.create', compact('idTema'));
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
    public function edit($idRecurso)
    {
        $IdRecurso2 = (int) $idRecurso;
        $Datos = DB::table('tblrecurso')
        ->where('Activo',1)
        ->where('IdRecurso',$IdRecurso2)
        ->first();
        return view('Admin.Recursos.edit', compact('Datos','IdRecurso2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ActualizarRecurso(Request $request, $idRecurso, $idTemaR)
    {
        
        $nombre = $request->get('nombre');
        $url = $request->get('url');
        $opcion = 2; //update        
        $sql = "call AC_Recurso('".$opcion."','".$idRecurso."','".$idTemaR."','".$nombre."','".$url."')";
        $recursos = DB::select($sql,array(1,100)); 
        return Redirect::to('/administrador/areas/temas-'.$idTemaR.'/recursos');

        // if($recursos != 1){
        //     return Redirect::to('/administrador/areas/temas/recursos'.$idRecurso.'/editar')->withErrors(['errors' => 'Error']);
        // }
        // else{
        //     return Redirect::to('/administrador/areas/temas-'.$idTemaR.'/recursos');
        // }
    }
    public function AgregarNuevoRecurso(Request $request ,$idTema2)
    {
        $idTema = (int) $idTema2;
        $opcion = 1;
        $url = $request->get('url');
        $nombre = $request->get('nombre');
        $idRecurso = 0;//(int)$idRecurso2;
        $sql = "call AC_Recurso ('".$opcion."','".$idRecurso."','".$idTema."', '".$nombre."', '".$url."')";;
        $recursos = DB::select($sql,array(1,100));        

        return Redirect::to('/administrador/areas/temas-'.$idTema.'/recursos');
       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteRecurso($idRecurso2)
    {
        $idRecurso = (int) $idRecurso2;
        $sql = "call Delete_Recurso ('".$idRecurso."')";;
        $recursos = DB::select($sql,array(1,100));
        
    }
}