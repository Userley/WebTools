<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicioResumenController extends Controller
{
    // RESUMEN
    // --------------------------------------------------------------

    public function resumen()
    {
        return view('servicios.resumen.resumen');
    }
}
