<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        return view('Admin.Cursos.index');
    }

    public function create()
    {
        return view('Admin.Cursos.create');
    }
}
