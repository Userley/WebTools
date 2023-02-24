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

        if (empty($Consumo[0])) {
            return response($Consumo, 200)->header('Content-type', 'text/plain');
        } else {
            // $detalle = Consumo_detalle::query()->where('idconsumo', $Consumo[0]->idconsumo)->get();
            $detalle = Consumo_detalle::join('pisos_casa', 'consumo_detalle.idpiso', '=', 'pisos_casa.idpiso')
                ->select('pisos_casa.descripcion', 'consumo_detalle.medidakw', 'consumo_detalle.costokw', 'consumo_detalle.igv', 'consumo_detalle.consumokw', 'consumo_detalle.montototalsinigv', 'consumo_detalle.montoigv', 'consumo_detalle.montototalconigv', 'consumo_detalle.montocostoadministrativo', 'consumo_detalle.montopagofraccionado', 'consumo_detalle.montototal')->where('consumo_detalle.idconsumo', '=', $Consumo[0]->idconsumo)->get();

            $resp[0]['Cabecera'] = $Consumo;
            $resp[0]['Detalle'] = $detalle;

            return response($resp, 200)->header('Content-type', 'text/plain');
        }

        // return response($resp, 200)->header('Content-type', 'text/plain');
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
