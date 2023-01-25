<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DispositivosController extends Controller
{
    public function index(){
        return view('dispositivos.dispositivos');
    }

    // public function create(){
    //     return view('dispositivos.create');
    // }

    // public function show($dispositivo){
    //     return view('dispositivos.show',compact('dispositivo'));
    // }
}
