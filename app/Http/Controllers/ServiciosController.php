<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\Consumo;
use App\Models\Consumo_detalle;
use App\Models\Mes;
use App\Models\Pisos_casa;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiciosController extends Controller
{
    public function luz()
    {
        $Anios = Anio::select('anio.idanio', 'anio.descripcion')->join('consumo', 'consumo.idanio', '=', 'anio.idanio')->distinct()->get();
        $Meses = Mes::select('mes.idmes', 'mes.descripcion')->join('consumo', 'consumo.idmes', '=', 'mes.idmes')->distinct()->orderby('mes.idmes')->get();
        $Fechas = consumo::select('anio.idanio', 'anio.descripcion as anio', 'mes.idmes', 'mes.descripcion as mes')->join('anio', 'consumo.idanio', '=', 'anio.idanio')->join('mes', 'consumo.idmes', '=', 'mes.idmes')->distinct()->orderby('anio.idanio','DESC')->orderby('mes.idmes','DESC')->get();
        return view('servicios.luz.luz', compact('Anios', 'Meses', 'Fechas'));
    }


    public function filtrarluz(Request $request)
    {
        $Consumo = Consumo::query()->where('idanio', $request->idanio)->where('idmes', $request->idmes)->get();

        if (empty($Consumo[0])) {
            return response($Consumo, 200)->header('Content-type', 'text/plain');
        } else {
            $detalle = Consumo_detalle::join('pisos_casa', 'consumo_detalle.idpiso', '=', 'pisos_casa.idpiso')
                ->select('pisos_casa.idpiso','pisos_casa.descripcion', 'consumo_detalle.medidakw', 'consumo_detalle.costokw', 'consumo_detalle.igv', 'consumo_detalle.consumokw', 'consumo_detalle.montototalsinigv', 'consumo_detalle.montoigv', 'consumo_detalle.montototalconigv', 'consumo_detalle.montocostoadministrativo', 'consumo_detalle.montopagofraccionado', 'consumo_detalle.montototal')->where('consumo_detalle.idconsumo', '=', $Consumo[0]->idconsumo)->get();

            $resp[0]['Cabecera'] = $Consumo;
            $resp[0]['Detalle'] = $detalle;

            return response($resp, 200)->header('Content-type', 'text/plain');
        }
    }


    public function saveluz(Request $request)
    {
        try {
            $ConsumoValidacion = Consumo::query()->where('idanio', $request->cabecera['idanio'])->where('idmes', $request->cabecera['idmes'])->first();
            if (empty($ConsumoValidacion)) {
                DB::beginTransaction();
                $Consumo = Consumo::select('idconsumo')->orderBy('idconsumo', 'desc')->first();

                $ConsumoSave = new Consumo();
                $ConsumoSave->idmes = intval($request->cabecera['idmes']);
                $ConsumoSave->idanio = intval($request->cabecera['idanio']);
                $ConsumoSave->consumokwtotal = floatval($request->cabecera['consumoKwh']);
                $ConsumoSave->precioxkw = floatval($request->cabecera['costoKwh']);
                $ConsumoSave->costoadministrativo = round(floatval($request->cabecera['cargoFijo']), 2);
                $ConsumoSave->costofraccionamiento = round(floatval($request->cabecera['fraccionamiento']), 2);
                $ConsumoSave->costototalconsumo = round(floatval($request->cabecera['montoMes']), 2);
                $ConsumoSave->igv = floatval($request->cabecera['igv']);
                $ConsumoSave->image = '';
                $ConsumoSave->save();

                $ConsumoPrev = Consumo::select('idconsumo')->orderBy('idconsumo', 'desc')->first();

                foreach ($request->detalle as $detalle) {
                    $datosDetalle = new Consumo_detalle();
                    $det = Consumo_detalle::select('medidakw')->where('idconsumo', '=', $Consumo->idconsumo)->where('idpiso', '=', $detalle['idpiso'])->first();

                    $datosDetalle->idpiso = intval($detalle['idpiso']);
                    $datosDetalle->idmes = intval($request->cabecera['idmes']);
                    $datosDetalle->idanio = intval($request->cabecera['idanio']);
                    $datosDetalle->medidakw = floatval($detalle['kwhActual']);
                    $datosDetalle->costokw = floatval($request->cabecera['costoKwh']);
                    $datosDetalle->igv = floatval($request->cabecera['igv']) / 100;
                    $datosDetalle->montocostoadministrativo = round(floatval($detalle['cargofijo']), 2);
                    $datosDetalle->montopagofraccionado = round(floatval($detalle['fraccionamiento']), 2);
                    $datosDetalle->idconsumo = intval($ConsumoPrev->idconsumo);

                    if ($detalle['idpiso'] == '1') {
                        $datosDetalle->consumokw = floatval(0);
                        $datosDetalle->montototalsinigv = floatval(0);
                        $datosDetalle->montoigv = floatval(0);
                        $datosDetalle->montototalconigv = floatval(0);
                        $datosDetalle->montototal = floatval(0);
                    } else {

                        $datosDetalle->consumokw =  floatval($detalle['kwhActual']) - floatval($det->medidakw);

                        $datosDetalle->montototalsinigv = round((floatval($detalle['kwhActual']) - floatval($det->medidakw)) * floatval($request->cabecera['costoKwh']), 2);
                        $datosDetalle->montoigv = round(((floatval($detalle['kwhActual']) - floatval($det->medidakw)) * floatval($request->cabecera['costoKwh'])) * (floatval($request->cabecera['igv']) / 100), 2);
                        $datosDetalle->montototalconigv = round((((floatval($detalle['kwhActual']) - floatval($det->medidakw)) * floatval($request->cabecera['costoKwh'])) * (floatval($request->cabecera['igv']) / 100)) + ((floatval($detalle['kwhActual']) - floatval($det->medidakw)) * floatval($request->cabecera['costoKwh'])), 2);
                        $datosDetalle->montototal = round((((floatval($detalle['kwhActual']) - floatval($det->medidakw)) * floatval($request->cabecera['costoKwh'])) * (floatval($request->cabecera['igv']) / 100)) + ((floatval($detalle['kwhActual']) - floatval($det->medidakw)) * floatval($request->cabecera['costoKwh'])) + floatval($detalle['cargofijo']) + floatval($detalle['fraccionamiento']), 2);
                    }
                    $datosDetalle->save();
                }

                $sumaFinal = Consumo_detalle::where('idconsumo', '=', $ConsumoPrev->idconsumo)->where('idpiso', '!=', '1')->get()->sum('montototal');
                $abc = round(floatval($request->cabecera['montoMes']) - floatval($sumaFinal), 2);
                $ActualizarPrimerPiso = Consumo_detalle::query()->where('idconsumo', '=', $ConsumoPrev->idconsumo)->where('idpiso', '=', '1')->update(['montototal' => $abc]);

                DB::commit();
                return response($ActualizarPrimerPiso, 200)->header('Content-type', 'text/plain');
            } else {
                return response('3', 200)->header('Content-type', 'text/plain');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response('2', 200)->header('Content-type', 'text/plain');
        }
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
