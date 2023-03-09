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
        $mesesNumber = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $mesesText = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"];
        $pisos = Pisos_casa::all();
        $consumosxPiso = [];

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


        // $Data = [];


        // for ($i = 0; $i < count($consumosPiso); $i++) {
        //     $element = $consumosPiso[$i];
        // }


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
        //         backgroundColor: 'rgba(' + randon1 + ',' + randon2 + ', ' + randon3 + ', 0.7)',
        //         pointBorderColor: "#fff",
        //         data: newArray // element.consumopiso // [0, 0, 65, 59, 80, 81, 56, 55, 40]
        //     };

        //     Data.push(obj);
        // }











































        $data = [];

        $data['meses'] = $mesesText;
        $data['consumo'] = $consumosxPiso;
        $jsondetalle = strval(json_encode($data));

        return view('servicios.resumen.resumen', compact('jsondetalle'));
    }
}
