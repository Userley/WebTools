<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrasesController extends Controller
{
    public function frases()
    {
        return view('memorias.frases.frases');
    }

    public function newfrases()
    {
        return view('memorias.frases.frasesnew');
    }
}
