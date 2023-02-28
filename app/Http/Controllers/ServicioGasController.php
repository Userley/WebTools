<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\ConsumoGas;
use App\Models\ConsumoGas_detalle;
use App\Models\Mes;
use App\Models\Pisos_casa;
use Illuminate\Http\Request;

class ServicioGasController extends Controller
{
    public function gas()
    {
        $Pisos = Pisos_casa::all();

        $ConsumosGas = ConsumoGas::select('mes.idmes', 'mes.descripcion as mes', 'anio.idanio', 'anio.descripcion as anio')
            ->join('anio', 'anio.idanio', '=', 'consumogas.idanio')
            ->join('mes', 'mes.idmes', '=', 'consumogas.idmes')
            ->distinct()->orderby('anio.idanio', 'DESC')
            ->orderby('mes.idmes', 'DESC')->get();
        return view('servicios.gas.gas', compact('Pisos', 'ConsumosGas'));
    }

    public function filtrargas(Request $request)
    {
        $ConsumoGas = ConsumoGas::query()->where('idanio', $request->idanio)->where('idmes', $request->idmes)->get();

        if (empty($ConsumoGas[0])) {
            return response($ConsumoGas, 200)->header('Content-type', 'text/plain');
        } else {
            $detalle = ConsumoGas_detalle::join('pisos_casa', 'consumogas_detalle.idpiso', '=', 'pisos_casa.idpiso')
                ->select('pisos_casa.idpiso', 'pisos_casa.descripcion', 'consumogas_detalle.cantpersonas','consumogas_detalle.montoxpersona', 'consumogas_detalle.subtotal')->where('consumogas_detalle.idconsumoagua', '=', $ConsumoAgua[0]->idconsumoagua)->get();

            $resp[0]['Cabecera'] = $ConsumoGas;
            $resp[0]['Detalle'] = $detalle;

            return response($resp, 200)->header('Content-type', 'text/plain');
        }
    }

    public function newgas()
    {
        $Anios = Anio::all();
        $Meses = Mes::all();
        $Pisos = Pisos_casa::all();
        return view('servicios.gas.gasnew', compact('Anios', 'Meses', 'Pisos'));
    }
}
