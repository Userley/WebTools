<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class ImagenesController extends Controller
{
    public function imagenes()
    {
        $Categorias =  Categorias::all();

        return view('memorias.imagenes.imagenes', compact('Categorias'));
    }

    public function newimagenes()
    {
        return view('memorias.imagenes.imagenesnew');
    }
}
