<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\Consumo;
use App\Models\Consumo_detalle;
use App\Models\Mes;
use App\Models\Pisos_casa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function luz()
    {
        $Anios = Anio::all();
        $Meses = Mes::all();

        return view('servicios.luz.luz', compact('Anios', 'Meses'));
    }


    public function filtrarluz(Request $request)
    {
        $Consumo = Consumo::query()->where('idanio', $request->idanio)->where('idmes', $request->idmes)->get();

        if (empty($Consumo[0])) {
            return response($Consumo, 200)->header('Content-type', 'text/plain');
        } else {
            $detalle = Consumo_detalle::join('pisos_casa', 'consumo_detalle.idpiso', '=', 'pisos_casa.idpiso')
                ->select('pisos_casa.descripcion', 'consumo_detalle.medidakw', 'consumo_detalle.costokw', 'consumo_detalle.igv', 'consumo_detalle.consumokw', 'consumo_detalle.montototalsinigv', 'consumo_detalle.montoigv', 'consumo_detalle.montototalconigv', 'consumo_detalle.montocostoadministrativo', 'consumo_detalle.montopagofraccionado', 'consumo_detalle.montototal')->where('consumo_detalle.idconsumo', '=', $Consumo[0]->idconsumo)->get();

            $resp[0]['Cabecera'] = $Consumo;
            $resp[0]['Detalle'] = $detalle;

            return response($resp, 200)->header('Content-type', 'text/plain');
        }
    }


    public function saveluz(Request $request)
    {
        $Consumo = Consumo::select('idconsumo')->orderBy('idconsumo', 'desc')->first();
        $datos = array();

        foreach ($request->detalle as $detalle) {

            $det = Consumo_detalle::select('medidakw')->where('idconsumo', '=', $Consumo->idconsumo)->where('idpiso', '=', $detalle['idpiso'])->get();
            array_push($datos, $det[0]->medidakw);
        }

        return response($datos, 200)->header('Content-type', 'text/plain');
    }


    public function agua()
    {
        return view('servicios.agua.agua');
    }

    public function internet()
    {
        return view('servicios.internet.internet');
    }

    public function otros()
    {
        return view('servicios.otros.otros');
    }


    public function newluz()
    {
        $Anios = Anio::all();
        $Meses = Mes::all();
        $Pisos = Pisos_casa::all();

        return view('servicios.luz.luznew', compact('Anios', 'Meses', 'Pisos'));
    }

    public function newagua()
    {
        return view('servicios.agua.aguanew');
    }

    public function newinternet()
    {
        return view('servicios.internet.internetnew');
    }
}
