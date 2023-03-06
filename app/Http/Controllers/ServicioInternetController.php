<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\ConsumoInternet;
use App\Models\ConsumoInternet_detalle;
use App\Models\Mes;
use App\Models\Pisos_casa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                ->select('pisos_casa.idpiso', 'pisos_casa.descripcion', 'consumointernet_detalle.cantpersonas','consumointernet_detalle.montoxpersona', 'consumointernet_detalle.subtotal')->where('consumointernet_detalle.idconsumointernet', '=', $ConsumoInternet[0]->idconsumointernet)->get();

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

    public function saveinternet(Request $request)
    {
        $ConsumoValidacion = ConsumoInternet::query()->where('idanio', $request->consumo['idanio'])->where('idmes', $request->consumo['idmes'])->first();
        if (empty($ConsumoValidacion)) {
            DB::beginTransaction();

            $ConsumoSave = new ConsumoInternet();
            $ConsumoSave->idmes = intval($request->consumo['idmes']);
            $ConsumoSave->idanio = intval($request->consumo['idanio']);
            $ConsumoSave->costototalconsumo = floatval($request->consumo['montorecibo']);
            $ConsumoSave->image = $request->consumo['imagen'];
            $ConsumoSave->comentarios = $request->consumo['comentario'];
            $dato = $ConsumoSave->save();

            $ConsumoPrev = ConsumoInternet::select('idconsumointernet')->orderBy('idconsumointernet', 'desc')->first();

            foreach ($request->consumodetalle as $detalle) {
                $datosDetalle = new ConsumoInternet_detalle();
                $datosDetalle->idpiso = intval($detalle['idpiso']);
                $datosDetalle->idmes = intval($request->consumo['idmes']);
                $datosDetalle->idanio = intval($request->consumo['idanio']);
                $datosDetalle->cantpersonas = intval($detalle['cantpersonas']);
                $datosDetalle->montoxpersona = floatval($detalle['montoxpersona']);
                $datosDetalle->subtotal = floatval($detalle['montoxpiso']);
                $datosDetalle->idconsumointernet = intval($ConsumoPrev->idconsumointernet);
                $datosDetalle->save();
            }

            DB::commit();
            return response($dato, 200)->header('Content-type', 'text/plain');
        } else {
            return response('0', 200)->header('Content-type', 'text/plain');
        }
        return response($request, 200)->header('Content-type', 'text/plain');
    }
}
