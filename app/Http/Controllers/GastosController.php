<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GastosController extends Controller
{
    public function gastos()
    {
        return view('gastos.gastos');
    }
}
