<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicioInternetController extends Controller
{
      // INTERNET
    // --------------------------------------------------------------

    public function internet()
    {
        return view('servicios.internet.internet');
    }

    public function newinternet()
    {
        return view('servicios.internet.internetnew');
    }



}
