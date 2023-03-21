<?php

namespace App\Http\Controllers;

use App\Models\Consumo;
use App\Models\Consumo_detalle;
use App\Models\ConsumoAgua;
use App\Models\ConsumoAgua_detalle;
use App\Models\ConsumoInternet_detalle;
use App\Models\Pisos_casa;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Concat;

class ServicioResumenController extends Controller
{
    // RESUMEN
    // --------------------------------------------------------------

    public function resumen()
    {
        $AniosLuz = consumo::select('anio.descripcion as anio')->join('anio', 'consumo.idanio', '=', 'anio.idanio')->distinct()->orderby('anio.idanio', 'DESC')->orderby('anio.idanio', 'DESC')->get();
        return view('servicios.resumen.resumen', compact('AniosLuz'));
    }

    public function filtrarresluz(Request $request)
    {
        $GraficoLuz1 = $this->GraficoLuz1($request->anio);
        $GraficoLuz2 = $this->GraficoLuz2($request->anio);
        $GraficoAgua3 = $this->GraficoAgua($request->anio);
        $GraficoInternet4 = $this->GraficoInternet($request->anio);

        $resp['Graf1'] = $GraficoLuz1;
        $resp['Graf2'] = $GraficoLuz2;
        $resp['Graf3'] = $GraficoAgua3;
        $resp['Graf4'] = $GraficoInternet4;
        return response($resp, 200)->header('Content-type', 'application/json');
    }

    public function GraficoLuz1($Anio)
    {
        $mesesNumber = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $mesesText = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"];
        $pisos = Pisos_casa::all();
        $consumosxPiso = [];
        $Datos = [];

        for ($i = 0; $i < count($pisos); $i++) {
            $ConsumoLuzDetalle = Consumo_detalle::query()->select('Mes.idmes', 'Anio.descripcion as anio', 'pisos_casa.idpiso', 'consumo_detalle.montototal')
                ->join('Mes', 'Mes.idmes', '=', 'consumo_detalle.idmes')
                ->join('Anio', 'Anio.idanio', '=', 'consumo_detalle.idanio')
                ->join('pisos_casa', 'pisos_casa.idpiso', '=', 'consumo_detalle.idpiso')
                ->whereIn('mes.idmes', $mesesNumber)
                ->where('anio.descripcion', $Anio)
                ->where('Pisos_casa.idpiso', $pisos[$i]->idpiso)
                ->orderby('Mes.idmes', 'asc')
                ->get();


            $consumos = [];
            $meses = [];
            for ($j = 0; $j < count($ConsumoLuzDetalle); $j++) {

                array_push($consumos, $ConsumoLuzDetalle[$j]->montototal);
                array_push($meses, $ConsumoLuzDetalle[$j]->idmes);
            }
            $consumosPiso['piso'] = $pisos[$i]->descripcion;
            $consumosPiso['meses'] = $meses;
            $consumosPiso['consumopiso'] = $consumos;
            array_push($consumosxPiso, $consumosPiso);
        }

        for ($i = 0; $i < count($consumosxPiso); $i++) {
            $element = $consumosxPiso[$i];
            $newArray = [];

            for ($j = 1; $j <= 12; $j++) {
                $con = 0;

                for ($k = 0; $k < count($element["meses"]); $k++) {

                    if ($j == $element["meses"][$k]) {

                        array_push($newArray, $element["consumopiso"][$k]);
                        $con++;
                    }
                }

                if ($con == 0) {
                    array_push($newArray, 0);
                }
            }

            $rnd1 = rand(1, 255);
            $rnd2 = rand(1, 255);
            $rnd3 = rand(1, 255);
            $obj['label'] = $element["piso"];
            $obj['backgroundColor'] = 'rgba(' . $rnd1 . ',' . $rnd2 . ', ' . $rnd3 . ', 0.7)';
            $obj['pointBorderColor'] = "#fff";
            $obj['data'] = $newArray;

            array_push($Datos, $obj);
        }

        $datahtml = [];
        $datahtml['meses'] = $mesesText;
        $datahtml['data'] = $Datos; // $consumosxPiso[1]['consumopiso'][0];
        $jsondetalle = json_encode($datahtml);

        return $jsondetalle;
    }

    public function GraficoLuz2($Anio)
    {
        $mesesText = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"];
        $Consumos = Consumo::query()->join('anio', 'anio.idanio', '=', 'consumo.idanio')->where('anio.descripcion', $Anio)->get();

        $ConsumosMensual = [];
        $lstConsumos = [];
        for ($i = 0; $i < count($Consumos); $i++) {
            $ConsumosMensual["mes"] = $Consumos[$i]->idmes;
            $ConsumosMensual["costo"] = $Consumos[$i]->precioxkw;
            array_push($lstConsumos, $ConsumosMensual);
        }

        $arrayvalores = [];

        for ($k = 1; $k <= 12; $k++) {
            $cont = 0;

            for ($j = 0; $j < count($lstConsumos); $j++) {

                if ($lstConsumos[$j]["mes"] == $k) {
                    array_push($arrayvalores, $lstConsumos[$j]["costo"]);
                    $cont++;
                    break;
                }
            }
            if ($cont == 0) {
                array_push($arrayvalores, 0);
            }
        }

        $Datos = [];
        $rnd1 = rand(1, 255);
        $rnd2 = rand(1, 255);
        $rnd3 = rand(1, 255);

        $obj['label'] = 'Costo por Kwh';
        $obj['backgroundColor'] = 'rgba(' . $rnd1 . ',' . $rnd2 . ', ' . $rnd3 . ', 0.7)';
        $obj['pointBorderColor'] = "#fff";
        $obj['data'] = $arrayvalores;

        array_push($Datos, $obj);

        $datahtml['meses'] = $mesesText;
        $datahtml['data'] = $Datos; // $consumosxPis
        return json_encode($datahtml);
    }

    public function GraficoAgua($Anio)
    {
        $mesesNumber = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $mesesText = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"];
        $pisos = Pisos_casa::all();
        $consumosxPiso = [];
        $Datos = [];

        for ($i = 0; $i < count($pisos); $i++) {
            $ConsumoAguaDetalle = ConsumoAgua_detalle::query()->select('Mes.idmes', 'Anio.descripcion as anio', 'pisos_casa.idpiso', 'consumoagua_detalle.subtotal')
                ->join('Mes', 'Mes.idmes', '=', 'consumoagua_detalle.idmes')
                ->join('Anio', 'Anio.idanio', '=', 'consumoagua_detalle.idanio')
                ->join('pisos_casa', 'pisos_casa.idpiso', '=', 'consumoagua_detalle.idpiso')
                ->whereIn('mes.idmes', $mesesNumber)
                ->where('anio.descripcion', $Anio)
                ->where('Pisos_casa.idpiso', $pisos[$i]->idpiso)
                ->orderby('Mes.idmes', 'asc')
                ->get();


            $consumos = [];
            $meses = [];
            for ($j = 0; $j < count($ConsumoAguaDetalle); $j++) {

                array_push($consumos, $ConsumoAguaDetalle[$j]->subtotal);
                array_push($meses, $ConsumoAguaDetalle[$j]->idmes);
            }
            $consumosPiso['piso'] = $pisos[$i]->descripcion;
            $consumosPiso['meses'] = $meses;
            $consumosPiso['consumopiso'] = $consumos;
            array_push($consumosxPiso, $consumosPiso);
        }

        for ($i = 0; $i < count($consumosxPiso); $i++) {
            $element = $consumosxPiso[$i];
            $newArray = [];

            for ($j = 1; $j <= 12; $j++) {
                $con = 0;

                for ($k = 0; $k < count($element["meses"]); $k++) {

                    if ($j == $element["meses"][$k]) {

                        array_push($newArray, $element["consumopiso"][$k]);
                        $con++;
                    }
                }

                if ($con == 0) {
                    array_push($newArray, 0);
                }
            }

            $rnd1 = rand(1, 255);
            $rnd2 = rand(1, 255);
            $rnd3 = rand(1, 255);
            $obj['label'] = $element["piso"];
            $obj['backgroundColor'] = 'rgba(' . $rnd1 . ',' . $rnd2 . ', ' . $rnd3 . ', 0.7)';
            $obj['pointBorderColor'] = "#fff";
            $obj['data'] = $newArray;
            array_push($Datos, $obj);
        }

        $datahtml = [];
        $datahtml['meses'] = $mesesText;
        $datahtml['data'] = $Datos; // $consumosxPiso[1]['consumopiso'][0];
        $jsondetalle = json_encode($datahtml);

        return $jsondetalle;
    }

    public function GraficoInternet($Anio)
    {
        $mesesNumber = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $mesesText = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"];
        $pisos = Pisos_casa::all();
        $consumosxPiso = [];
        $Datos = [];

        for ($i = 0; $i < count($pisos); $i++) {
            $ConsumoInternetDetalle = ConsumoInternet_detalle::query()->select('Mes.idmes', 'Anio.descripcion as anio', 'pisos_casa.idpiso', 'consumointernet_detalle.subtotal')
                ->join('Mes', 'Mes.idmes', '=', 'consumointernet_detalle.idmes')
                ->join('Anio', 'Anio.idanio', '=', 'consumointernet_detalle.idanio')
                ->join('pisos_casa', 'pisos_casa.idpiso', '=', 'consumointernet_detalle.idpiso')
                ->whereIn('mes.idmes', $mesesNumber)
                ->where('anio.descripcion', $Anio)
                ->where('Pisos_casa.idpiso', $pisos[$i]->idpiso)
                ->orderby('Mes.idmes', 'asc')
                ->get();


            $consumos = [];
            $meses = [];
            for ($j = 0; $j < count($ConsumoInternetDetalle); $j++) {

                array_push($consumos, $ConsumoInternetDetalle[$j]->subtotal);
                array_push($meses, $ConsumoInternetDetalle[$j]->idmes);
            }
            $consumosPiso['piso'] = $pisos[$i]->descripcion;
            $consumosPiso['meses'] = $meses;
            $consumosPiso['consumopiso'] = $consumos;
            array_push($consumosxPiso, $consumosPiso);
        }

        for ($i = 0; $i < count($consumosxPiso); $i++) {
            $element = $consumosxPiso[$i];
            $newArray = [];

            for ($j = 1; $j <= 12; $j++) {
                $con = 0;

                for ($k = 0; $k < count($element["meses"]); $k++) {

                    if ($j == $element["meses"][$k]) {

                        array_push($newArray, $element["consumopiso"][$k]);
                        $con++;
                    }
                }

                if ($con == 0) {
                    array_push($newArray, 0);
                }
            }

            $rnd1 = rand(1, 255);
            $rnd2 = rand(1, 255);
            $rnd3 = rand(1, 255);
            $obj['label'] = $element["piso"];
            $obj['backgroundColor'] = 'rgba(' . $rnd1 . ',' . $rnd2 . ', ' . $rnd3 . ', 0.7)';
            $obj['pointBorderColor'] = "#fff";
            $obj['data'] = $newArray;
            array_push($Datos, $obj);
        }

        $datahtml = [];
        $datahtml['meses'] = $mesesText;
        $datahtml['data'] = $Datos; 
        $jsondetalle = json_encode($datahtml);

        return $jsondetalle;
    }

}
