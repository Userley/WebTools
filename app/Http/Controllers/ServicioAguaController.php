<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\ConsumoAgua;
use App\Models\Mes;
use App\Models\Pisos_casa;
use Illuminate\Http\Request;

class ServicioAguaController extends Controller
{
    // AGUA
    // --------------------------------------------------------------

    public function agua()
    {
        // $Anios = Anio::all();
        // $Meses = Mes::all();
        $Pisos = Pisos_casa::all();

        $ConsumosAgua = ConsumoAgua::select('mes.idmes', 'mes.descripcion as mes', 'anio.idanio', 'anio.descripcion as anio')
            ->join('anio', 'anio.idanio', '=', 'consumoagua.idanio')
            ->join('mes', 'mes.idmes', '=', 'consumoagua.idmes')
            ->distinct()->orderby('anio.idanio', 'DESC')
            ->orderby('mes.idmes', 'DESC')->get();
        return view('servicios.agua.agua', compact('Pisos', 'ConsumosAgua'));
    }

    public function newagua()
    {
        $Anios = Anio::all();
        $Meses = Mes::all();
        $Pisos = Pisos_casa::all();
        return view('servicios.agua.aguanew', compact('Anios', 'Meses', 'Pisos'));
    }
}
