<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function videos()
    {
        return view('memorias.videos');
    }

    public function newvideos()
    {
        return view('memorias.videosnew');
    }
}
