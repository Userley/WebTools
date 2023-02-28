<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\ConsumoInternet;
use App\Models\Mes;
use App\Models\Pisos_casa;
use Illuminate\Http\Request;

class ServicioInternetController extends Controller
{
    // INTERNET
    // --------------------------------------------------------------

    public function internet()
    {
        $Pisos = Pisos_casa::all();

        $ConsumosInternet = ConsumoInternet::select('mes.idmes', 'mes.descripcion as mes', 'anio.idanio', 'anio.descripcion as anio')
            ->join('anio', 'anio.idanio', '=', 'consumointernet.idanio')
            ->join('mes', 'mes.idmes', '=', 'consumointernet.idmes')
            ->distinct()->orderby('anio.idanio', 'DESC')
            ->orderby('mes.idmes', 'DESC')->get();

        return view('servicios.internet.internet', compact('Pisos', 'ConsumosInternet'));
    }

    public function newinternet()
    {
        $Anios = Anio::all();
        $Meses = Mes::all();
        $Pisos = Pisos_casa::all();

        return view('servicios.internet.internetnew', compact('Anios', 'Meses', 'Pisos'));
    }
}
