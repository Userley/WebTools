<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Imagenes;
use Illuminate\Http\Request;

class ImagenesController extends Controller
{
    public function imagenes()
    {
        $Categorias =  Categorias::select('categorias.idcategoria', 'categorias.descripcion')->join('Imagenes', 'Imagenes.idcategoria', '=', 'categorias.idcategoria')->distinct()->get();
        $Imagenes = Imagenes::select('imagenes.idimagenes', 'categorias.idcategoria', 'categorias.descripcion as categorias', 'imagenes.titulo', 'imagenes.imagen')->join('categorias', 'categorias.idcategoria', '=', 'imagenes.idcategoria')->where('imagenes.estado', '=', '1')->get();
        return view('memorias.imagenes.imagenes', compact('Categorias', 'Imagenes'));
    }

    public function newimagenes()
    {
        $Categorias =  Categorias::all();
        return view('memorias.imagenes.imagenesnew', compact('Categorias'));
    }

    public function saveimagenes(Request $request)
    {
        $numero = count($request->data);

        for ($i = 0; $i < $numero; $i++) {
            $imagen = new Imagenes();

            $imagen->titulo = $request->data[$i]['nombre'];
            $imagen->imagen = $request->data[$i]['img'];
            $imagen->idcategoria = $request->data[$i]['categoria'];
            $imagen->estado = 1;
            $imagen->save();
        }

        return response($numero, 200)->header('Content-type', 'text/plain');
    }
}
