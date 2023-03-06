<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Imagenes;
use Illuminate\Http\Request;

class ImagenesController extends Controller
{
    public function imagenes(Request $request)
    {
        $Categorias =  Categorias::select('categorias.idcategoria', 'categorias.descripcion')->join('Imagenes', 'Imagenes.idcategoria', '=', 'categorias.idcategoria')->distinct()->orderby('categorias.descripcion', 'ASC')->get();
        $Imagenes = Imagenes::select('imagenes.idimagenes', 'categorias.idcategoria', 'categorias.descripcion as categorias', 'imagenes.titulo', 'imagenes.imagen')->join('categorias', 'categorias.idcategoria', '=', 'imagenes.idcategoria')->where('imagenes.idcategoria', '!=', '9')->where('imagenes.estado', '=', '1')->paginate(30);
        $pass = "Manson.87";
        if ($request->ajax()) {
            if ($request->idcategoria == '0') {
                return response()->json(view('memorias.imagenes.seccionimg', compact('Categorias', 'Imagenes'))->render());
            } else {
                if ($request->pass ===$pass) {
                    $Imagenes = Imagenes::select('imagenes.idimagenes', 'categorias.idcategoria', 'categorias.descripcion as categorias', 'imagenes.titulo', 'imagenes.imagen')->join('categorias', 'categorias.idcategoria', '=', 'imagenes.idcategoria')->where('imagenes.estado', '=', '1')->where('imagenes.idcategoria', '=', $request->idcategoria)->paginate(30);
                    return response()->json(view('memorias.imagenes.seccionimg', compact('Categorias', 'Imagenes'))->render());
                } else {
                    return response()->json(view('memorias.imagenes.seccionimg', compact('Categorias', 'Imagenes'))->render());
                }
            }
        }

        return view('memorias.imagenes.imagenes', compact('Categorias', 'Imagenes'));
    }

    public function newimagenes()
    {
        $Categorias =  Categorias::query()->orderby('descripcion', 'asc')->get();
        return view('memorias.imagenes.imagenesnew', compact('Categorias'));
    }

    public function saveimagenes(Request $request)
    {
        try {
            $numero = count($request->data);

            for ($i = 0; $i < $numero; $i++) {
                $valImagen = Imagenes::query()->where('titulo', '=', $request->data[$i]['nombre'])->get();
                $imagen = new Imagenes();

                $imagen->titulo = $request->data[$i]['nombre'];
                $imagen->imagen = $request->data[$i]['img'];
                $imagen->idcategoria = $request->data[$i]['categoria'];
                $imagen->estado = 1;
                $imagen->save();
            }
            //code...
        } catch (\Throwable $th) {
            $numero = 0;
        }

        return response($numero, 200)->header('Content-type', 'text/plain');
    }

    public function filtrarimagenes(Request $request)
    {
        $Imagenes = [];
        $seguridad = 0;
        $pass = "Mansono.87";

        if ($request->idcategoria == '9') {
            $seguridad = 1;
        }

        if ($request->idcategoria == '0') {
            $Imagenes = Imagenes::select('imagenes.idimagenes', 'categorias.idcategoria', 'categorias.descripcion as categorias', 'imagenes.titulo', 'imagenes.imagen')->join('categorias', 'categorias.idcategoria', '=', 'imagenes.idcategoria')->where('imagenes.estado', '=', '1')->paginate(2);
        } else {
            $Imagenes = Imagenes::select('imagenes.idimagenes', 'categorias.idcategoria', 'categorias.descripcion as categorias', 'imagenes.titulo', 'imagenes.imagen')->join('categorias', 'categorias.idcategoria', '=', 'imagenes.idcategoria')->where('imagenes.estado', '=', '1')->where('imagenes.idcategoria', '=', $request->idcategoria)->paginate(2);
        }

        return response([$Imagenes, $seguridad, $pass],  200)->header('Content-type', 'text/plain');
    }

    public function removeimagen(Request $request)
    {
        $Imagen = Imagenes::find($request->id);
        $result = $Imagen->delete();

        return response($result,  200)->header('Content-type', 'text/plain');
    }
}
