<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index()
    {
        $name = auth()->user()->name;
        //$nombre = \DB::table('users')->select('name')->where('email', $email)->get();

        return view('principal', compact('name'));
    }
}
