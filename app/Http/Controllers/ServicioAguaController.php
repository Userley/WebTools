<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\ConsumoAgua;
use App\Models\ConsumoAgua_detalle;
use App\Models\Mes;
use App\Models\Pisos_casa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioAguaController extends Controller
{
    // AGUA
    // --------------------------------------------------------------

    public function agua()
    {
        $Pisos = Pisos_casa::all();

        $ConsumosAgua = ConsumoAgua::select('mes.idmes', 'mes.descripcion as mes', 'anio.idanio', 'anio.descripcion as anio')
            ->join('anio', 'anio.idanio', '=', 'consumoagua.idanio')
            ->join('mes', 'mes.idmes', '=', 'consumoagua.idmes')
            ->distinct()->orderby('anio.idanio', 'DESC')
            ->orderby('mes.idmes', 'DESC')->get();
        return view('servicios.agua.agua', compact('Pisos', 'ConsumosAgua'));
    }

    public function filtraragua(Request $request)
    {
        $ConsumoAgua = ConsumoAgua::query()->where('idanio', $request->idanio)->where('idmes', $request->idmes)->get();

        if (empty($ConsumoAgua[0])) {
            return response($ConsumoAgua, 200)->header('Content-type', 'text/plain');
        } else {
            $detalle = ConsumoAgua_detalle::join('pisos_casa', 'consumoagua_detalle.idpiso', '=', 'pisos_casa.idpiso')
                ->select('pisos_casa.idpiso', 'pisos_casa.descripcion', 'consumoagua_detalle.cantpersonas', 'consumoagua_detalle.montoxpersona', 'consumoagua_detalle.subtotal')->where('consumoagua_detalle.idconsumoagua', '=', $ConsumoAgua[0]->idconsumoagua)->get();

            $resp[0]['Cabecera'] = $ConsumoAgua;
            $resp[0]['Detalle'] = $detalle;

            return response($resp, 200)->header('Content-type', 'text/plain');
        }
    }

    public function newagua()
    {
        $Anios = Anio::all();
        $Meses = Mes::all();
        $Pisos = Pisos_casa::all();
        return view('servicios.agua.aguanew', compact('Anios', 'Meses', 'Pisos'));
    }

    public function saveagua(Request $request)
    {
        $ConsumoValidacion = ConsumoAgua::query()->where('idanio', $request->consumo['idanio'])->where('idmes', $request->consumo['idmes'])->first();
        if (empty($ConsumoValidacion)) {
            DB::beginTransaction();

            $ConsumoSave = new ConsumoAgua();
            $ConsumoSave->idmes = intval($request->consumo['idmes']);
            $ConsumoSave->idanio = intval($request->consumo['idanio']);
            $ConsumoSave->costototalconsumo = floatval($request->consumo['montorecibo']);
            $ConsumoSave->image = $request->consumo['imagen'];
            $ConsumoSave->comentarios = $request->consumo['comentario'];
            $dato = $ConsumoSave->save();

            $ConsumoPrev = ConsumoAgua::select('idconsumoagua')->orderBy('idconsumoagua', 'desc')->first();

            foreach ($request->consumodetalle as $detalle) {
                $datosDetalle = new consumoagua_detalle();
                $datosDetalle->idpiso = intval($detalle['idpiso']);
                $datosDetalle->idmes = intval($request->consumo['idmes']);
                $datosDetalle->idanio = intval($request->consumo['idanio']);
                $datosDetalle->cantpersonas = intval($detalle['cantpersonas']);
                $datosDetalle->montoxpersona = floatval($detalle['montoxpersona']);
                $datosDetalle->subtotal = floatval($detalle['montoxpiso']);
                $datosDetalle->idconsumoagua = intval($ConsumoPrev->idconsumoagua);
                $datosDetalle->save();
            }

            DB::commit();
            return response($dato, 200)->header('Content-type', 'text/plain');
        } else {
            return response('3', 200)->header('Content-type', 'text/plain');
        }
        return response($request, 200)->header('Content-type', 'text/plain');
    }

    public function eliminaragua(Request $request)
    {
        $detalleAgua = ConsumoAgua_detalle::query()->where('idconsumoagua', $request->id)->delete();

        if ($detalleAgua > 0) {
            $agua = ConsumoAgua::query()->where('idconsumoagua', $request->id)->delete();

            if ($agua > 0) {
                return response(1, 200)->header('Content-type', 'text/plain');
            }
        }
        return response(0, 200)->header('Content-type', 'text/plain');
    }
}
