<?php

namespace App\Http\Controllers;

use App\Models\Consumo;
use App\Models\Consumo_detalle;
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
                ->where('anio.descripcion', 2022)
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

        // Codigo en  Javascript
        // let Meses = JSON.parse(textarea.value)['meses'];
        // let Consumos = JSON.parse(textarea.value)['consumo'];
        // let Data = [];

        // for (let indexConsumo = 0; indexConsumo < Consumos.length; indexConsumo++) {
        //     const element = Consumos[indexConsumo];
        //     let newArray = [];
        //     for (let indexmes = 1; indexmes <= 12; indexmes++) {
        //         let con = 0;
        //         for (let index = 0; index < element.meses.length; index++) {
        //             if (indexmes == element.meses[index]) {
        //                 newArray.push(element.consumopiso[index]);
        //                 con++;
        //                 break;
        //             }
        //         }
        //         if (con == 0) {
        //             newArray.push(0);
        //         }
        //     }
        //     console.log(newArray);
        //     let randon1 = Math.floor(Math.random() * (255 - 1)) + 1;
        //     let randon2 = Math.floor(Math.random() * (255 - 1)) + 1;
        //     let randon3 = Math.floor(Math.random() * (255 - 1)) + 1;

        //     let obj = {
        //         label: element.piso,
        //         backgroundColor: 'rgba(' + randon1 + ',' + randon2 + ', ' + randon3 + ', 0.6)',
        //         pointBorderColor: "#fff",
        //         data: newArray // element.consumopiso // [0, 0, 65, 59, 80, 81, 56, 55, 40]
        //     };

        //     Data.push(obj);
        // }


        $datahtml = [];

        $datahtml['meses'] = $mesesText;
        $datahtml['data'] = $Datos; // $consumosxPiso[1]['consumopiso'][0];


        $jsondetalle = strval(json_encode($datahtml));

        return view('servicios.resumen.resumen', compact('jsondetalle', 'AniosLuz'));
    }

    public function filtrarresluz(Request $request)
    {
        $mesesText = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"];
        $Consumos = Consumo::query()->join('anio', 'anio.idanio', '=', 'consumo.idanio')->where('anio.descripcion', $request->anio)->get();

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

        $Datos=[];
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

        return response($datahtml, 200)->header('Content-type', 'application/json');
    }

    public function filtrarresagua(Request $request)
    {
        # code...
    }

    public function filtrarresinternet(Request $request)
    {
        # code...
    }
}
