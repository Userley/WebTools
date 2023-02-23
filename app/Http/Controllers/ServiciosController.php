<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\Consumo;
use App\Models\Consumo_detalle;
use App\Models\Mes;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function luz()
    {
        $Anios = Anio::all();
        $Meses = Mes::all();

        return view('servicios.luz', compact('Anios', 'Meses'));
    }


    public function filtrarluz(Request $request)
    {
        $Consumo = Consumo::query()->where('idanio', $request->idanio)->where('idmes', $request->idmes)->get();

            $detalle = Consumo_detalle::query()->where('idconsumo', $Consumo[0]->idconsumo)->get();
            $resp['Cabecera'] = $Consumo;
            $resp['Detalle'] = $detalle;

        // return  json_encode($resp);
        return response($resp, 200)->header('Content-type', 'text/plain');
    }


    public function agua()
    {
        return view('servicios.agua');
    }

    public function internet()
    {
        return view('servicios.internet');
    }

    public function otros()
    {
        return view('servicios.otros');
    }


    public function newluz()
    {
        return view('servicios.luznew');
    }

    public function newagua()
    {
        return view('servicios.aguanew');
    }

    public function newinternet()
    {
        return view('servicios.internetnew');
    }
}
