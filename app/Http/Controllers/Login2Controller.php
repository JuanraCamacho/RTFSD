<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login2Controller extends Controller
{
    public function index(/*$nombre*/)
    {
        return view('Login2');// compact('nombre'));
    }
}
