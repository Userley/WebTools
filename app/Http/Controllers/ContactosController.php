<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactosController extends Controller
{
    public function index(){
        return view('contactos.contactos');
    }

    public function crear(){
        return view('contactos.crear');
    }

    public function detalle(){
        return view('contactos.detalle');
    }

    // public function show($dispositivo){
    //     return view('contactos.show',compact('dispositivo'));
    // }
}
