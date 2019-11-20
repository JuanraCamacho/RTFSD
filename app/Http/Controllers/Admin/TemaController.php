<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class TemaController extends Controller
{
    public function index($idArea)
    {        
        if(Self::validarSiUsuarioActivo()){
            $IdArea2 = (int)$idArea;     
            $sql = "call GetTemas ('".$IdArea2."')";
            $temas = DB::select($sql,array(1,100));         
            
            if($temas == null){
                return Redirect::to('/administrador/areas')->withErrors(['erroregistro'=> 'Error']);
            }        
            //return Redirect::to('/administrador/areas-'.$idArea.'/temas',compact('temas'));             
            return view('Admin.Temas.index', compact(['temas','IdArea2']));//Grid de temas de un área
        } 
        else{
            return Redirect::to('/login2');
        }
        
    }

    public function create($idArea)
    {      
        if(Self::validarSiUsuarioActivo())
        {
            $IdArea = (int)$idArea;
            $informacion = DB::table('tblarea')
            ->where('Activo',1)
            ->where('IdArea',$IdArea)
            ->first();
            // $Area = $informacion->Nombre;
            // dd($Area);
            return view('Admin.Temas.create',compact('informacion'));
        } 
        else
        {
            return Redirect::to('/login2');
        }  
        
    }

    public function agregarTemas(Request $request, $idArea)
    {       
        if(Self::validarSiUsuarioActivo())
        { 
        $opcion = 1;//create
        $nombre = $request->get('nombre'); 
        $resenia = $request->get('resenia'); 
        $IdArea = (int)$idArea;
        //dd($nombre,$IdArea,$resenia);           
        $sql = "call AC_Tema ('".$opcion."','".$IdArea."','".$nombre."','".$resenia."')";
        $tema = DB::select($sql,array(1,100));        
        if($tema != 1){
            return Redirect::to('/administrador/areas-'.$IdArea.'/temas')->withErrors(['erroregistro'=> 'Error']);
        }
        return Redirect::to('/administrador/areas-'.$IdArea.'/temas');
    } 
        else
        {
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
}
