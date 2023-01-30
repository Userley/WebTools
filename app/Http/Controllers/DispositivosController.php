<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispositivosController extends Controller
{
    public function index(){
        return view('dispositivos.listar');
    }

    public function crear(){
        return view('dispositivos.crear');
    }

    // public function show($dispositivo){
    //     return view('dispositivos.show',compact('dispositivo'));
    // }
}
