<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiciosController extends Controller
{
    public function luz(){
        return view('servicios.luz');
    }

    public function agua(){
        return view('servicios.agua');
    }

    public function internet(){
        return view('servicios.internet');
    }

    public function otros(){
        return view('servicios.otros');
    }


    public function newluz(){
        return view('servicios.luznew');
    }

    public function newagua(){
        return view('servicios.aguanew');
    }

    public function newinternet(){
        return view('servicios.internetnew');
    }
}
