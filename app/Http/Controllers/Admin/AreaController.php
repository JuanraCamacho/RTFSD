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

class AreaController extends Controller
{
    public function index(){
        // $areas = DB::table('tblarea')
        // ->where('Activo', 1)->get();
        if(Self::validarSiUsuarioActivo()){
                $sql = "call GetAreas ()";
                $areas = DB::select($sql,array(1,100));
                return view('Admin.Areas.index', compact('areas'));
        } else{
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

    public function create(){
        return view('Admin.Areas.create');        
    }    

    public function edit($id)
    {
        $informacion = DB::table('tblarea')
        ->where('Activo',1)
        ->where('IdArea',$id)
        ->first();
        return view('Admin.Areas.edit', compact('informacion','id'));
    }

    public function delete($idArea)
    {
        $sql = "call Delete_Area ('".$idArea."')";
        $areas = DB::select($sql,array(1,100));  
        if($areas != 1){
            return Redirect::to('/administrador/areas')->withErrors(['erroregistro'=> 'Error']);
        }
        return Redirect::to('/administrador/areas');      
    }    

    public function registrarArea(Request $request)
    {
        $nombre = $request->get('nombre');        
        $opcion = 1;//create
        $idArea = 0;                
        $sql = "call AC_Area ('".$opcion."','".$idArea."','".$nombre."')";
        $areas = DB::select($sql,array(1,100));        
        if($areas != 1){
            return Redirect::to('/administrador/areas')->withErrors(['erroregistro'=> 'Error']);
        }
        return Redirect::to('/administrador/areas');
    }

    public function actualizarArea(Request $request, $idArea)
    {
        $nombre = $request->get('nombre');        
        $opcion = 2; //update        
        $sql = "call AC_Area ('".$opcion."','".$idArea."','".$nombre."')";;
        $areas = DB::select($sql,array(1,100));        
        if($areas != 1){
            return Redirect::to('/administrador/areas/edit-'.$idArea)->withErrors(['errors' => 'Error']);
        }
        else{
            return Redirect::to('/administrador/areas');
        }
    }
}
