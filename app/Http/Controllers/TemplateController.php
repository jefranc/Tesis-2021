<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    //
    public function index()
    {

        return view('nuevo');
    }
    public function guardarevaluacion()
    {

        return view('nuevo2');
    }
}
