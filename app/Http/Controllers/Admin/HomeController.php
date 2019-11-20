<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class HomeController extends Controller
{
    public function index(){
        if(Self::validarSiUsuarioActivo()){
            return view('layouts.master');
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
}
