<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrasesController extends Controller
{
    public function frases()
    {
        return view('memorias.frases');
    }

    public function newfrases()
    {
        return view('memorias.frasesnew');
    }
}
