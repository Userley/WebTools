<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\ConsumoInternet;
use App\Models\ConsumoInternet_detalle;
use App\Models\Mes;
use App\Models\Pisos_casa;
use Illuminate\Http\Request;

class ServicioInternetController extends Controller
{
    // INTERNET
    // --------------------------------------------------------------

    public function internet()
    {
        // $Anios = Anio::all();
        // $Meses = Mes::all();
        $Pisos = Pisos_casa::all();

        $ConsumosInternet = ConsumoInternet::select('mes.idmes', 'mes.descripcion as mes', 'anio.idanio', 'anio.descripcion as anio')
            ->join('anio', 'anio.idanio', '=', 'consumointernet.idanio')
            ->join('mes', 'mes.idmes', '=', 'consumointernet.idmes')
            ->distinct()->orderby('anio.idanio', 'DESC')
            ->orderby('mes.idmes', 'DESC')->get();
        return view('servicios.internet.internet', compact('Pisos', 'ConsumosInternet'));
    }

    public function filtrarinternet(Request $request)
    {
        $ConsumoInternet = ConsumoInternet::query()->where('idanio', $request->idanio)->where('idmes', $request->idmes)->get();

        if (empty($ConsumoInternet[0])) {
            return response($ConsumoInternet, 200)->header('Content-type', 'text/plain');
        } else {
            $detalle = ConsumoInternet_detalle::join('pisos_casa', 'consumointernet_detalle.idpiso', '=', 'pisos_casa.idpiso')
                ->select('pisos_casa.idpiso', 'pisos_casa.descripcion', 'consumointernet_detalle.cantpersonas','consumointernet_detalle.montoxpersona', 'consumointernet_detalle.subtotal')->where('consumoagua_detalle.idconsumoagua', '=', $ConsumoAgua[0]->idconsumoagua)->get();

            $resp[0]['Cabecera'] = $ConsumoInternet;
            $resp[0]['Detalle'] = $detalle;

            return response($resp, 200)->header('Content-type', 'text/plain');
        }
    }

    public function newinternet()
    {
        $Anios = Anio::all();
        $Meses = Mes::all();
        $Pisos = Pisos_casa::all();

        return view('servicios.internet.internetnew', compact('Anios', 'Meses', 'Pisos'));
    }
}
