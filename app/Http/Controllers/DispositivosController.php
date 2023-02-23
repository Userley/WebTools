<?php

namespace App\Http\Controllers;

use App\Http\Requests\DispositivosRequest;
use App\Models\Dispositivos;
use Illuminate\Http\Request;

class DispositivosController extends Controller
{
    public function index()
    {
        return view('dispositivos.dispositivos');
    }

    public function crear()
    {
        return view('dispositivos.crear');
    }

    public function registrar(DispositivosRequest $Dispositivo)
    {

        $_dispositivo = new Dispositivos();

        $_dispositivo->nombre = $Dispositivo->Nombre;
        $_dispositivo->descripcion = $Dispositivo->Descripcion;
        $_dispositivo->save();

        return redirect()->route('dispositivos.crear', $_dispositivo);
    }

    public function detalle()
    {
        return view('dispositivos.detalle');
    }

    // public function show($dispositivo){
    //     return view('dispositivos.show',compact('dispositivo'));
    // }
}
