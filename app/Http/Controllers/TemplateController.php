<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    //
    public function index()
    {

        return view('nuevo', ['productos' => Producto::all()]);
    }
    public function index2()
    {

        return view('nuevo2', ['productos' => Producto::all()]);
    }
    public function guardarevaluacion()
    {

        return view('nuevo2', ['productos' => Producto::all()]);
    }
}
