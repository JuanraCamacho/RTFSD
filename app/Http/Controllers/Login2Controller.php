<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class Login2Controller extends Controller
{
    public function index(/*$nombre*/)
    {
        return view('Login2');// compact('nombre'));
    }
}
