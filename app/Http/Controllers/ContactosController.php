<?php

namespace App\Http\Controllers;

use App\Models\Contactos;
use Illuminate\Http\Request;

class ContactosController extends Controller
{
    public function index()
    {

        $contactos = Contactos::paginate();

        // return $contactos;
        return view('contactos.contactos', compact('contactos'));
    }

    public function crear()
    {
        return view('contactos.crear');
    }

    public function save(Request $request)
    {
        $Contactos = new Contactos();
        $Contactos->nombres = $request->nombres;
        $Contactos->apellidos = $request->apellidos;
        $Contactos->avatar = $request->avatar;
        $Contactos->cargo = $request->cargo;
        $Contactos->organizacion = $request->organizacion;
        $Contactos->telefono = $request->telefono;
        $Contactos->celular = $request->celular;
        $Contactos->direccion = $request->direccion;
        $Contactos->ciudad = $request->ciudad;
        $Contactos->correo = $request->correo;
        $Contactos->facebook = $request->facebook;
        $Contactos->twitter = $request->twitter;
        $Contactos->instagram = $request->instagram;
        $Contactos->tiktok = $request->tiktok;
        $Contactos->otros = $request->otros;
        $Contactos->estado = 1;
        $Contactos->oculto = 0;
        $estado = $Contactos->save();

        return view('contactos.crear', compact('estado'));
    }


    public function detalle()
    {
        return view('contactos.detalle');
    }

    // public function show($dispositivo){
    //     return view('contactos.show',compact('dispositivo'));
    // }
}
