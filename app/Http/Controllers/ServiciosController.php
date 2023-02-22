<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\Consumo;
use App\Models\Mes;
use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function luz()
    {
        $Anios = Anio::all();
        $Meses = Mes::all();

        return view('servicios.luz', compact('Anios', 'Meses'));
    }


    public function filtrarluz($mes, $anio)
    {
        $Consumo = Consumo::query()->where('idanio', $anio)->where('idmes', $mes)->get();
        return var_dump($Consumo);
        //return  view('servicios.luz', compact('Consumo'));
    }


    public function agua()
    {
        return view('servicios.agua');
    }

    public function internet()
    {
        return view('servicios.internet');
    }

    public function otros()
    {
        return view('servicios.otros');
    }


    public function newluz()
    {
        return view('servicios.luznew');
    }

    public function newagua()
    {
        return view('servicios.aguanew');
    }

    public function newinternet()
    {
        return view('servicios.internetnew');
    }
}
