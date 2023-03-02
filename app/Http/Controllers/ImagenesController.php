<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagenesController extends Controller
{
    public function imagenes()
    {
        return view('memorias.imagenes');
    }

    public function newimagenes()
    {
        return view('memorias.imagenesnew');
    }
}
