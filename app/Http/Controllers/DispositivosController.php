<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispositivosController extends Controller
{
    public function index(){
        return view('dispositivos.dispositivos');
    }

    public function crear(){
        return view('dispositivos.crear');
    }

    public function detalle(){
        return view('dispositivos.detalle');
    }

    // public function show($dispositivo){
    //     return view('dispositivos.show',compact('dispositivo'));
    // }
}
