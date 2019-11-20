<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Self::validarSiUsuarioActivo()){
            return view('home');
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
