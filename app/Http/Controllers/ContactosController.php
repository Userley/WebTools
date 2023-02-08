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
        return view('contactos.contactos',compact('contactos'));
    }

    public function crear()
    {
        return view('contactos.crear');
    }

    public function detalle()
    {
        return view('contactos.detalle');
    }

    // public function show($dispositivo){
    //     return view('contactos.show',compact('dispositivo'));
    // }
}
