<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicioOtrosController extends Controller
{
    // OTROS
    // --------------------------------------------------------------

    public function otros()
    {
        return view('servicios.otros.otros');
    }

    public function newotros()
    {
        return view('servicios.otros.otrosnew');
    }
}
