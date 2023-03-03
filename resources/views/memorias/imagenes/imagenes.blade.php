@extends('layouts.plantilla')

@section('title', 'Imágenes')

@section('header')
    <div class="col-lg-10">
        <h2>Servicios</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Memorias</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Imágenes</a>
            </li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="d-flex align-content-center">
        <a href="{{ url('/memorias/imagenes/crear/') }}"> <button class="btn btn-primary col-md-12"><i class="fa fa-file-o"
                    aria-hidden="true"></i> Nuevo registro</button></a>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-filter" aria-hidden="true"></i>
                        Categorias</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-12">
                            <div style="overflow-y: scroll; height:330px">
                                <ul class="list-group" id="listafechas">
                                    @foreach ($Categorias as $categoria)
                                        <li class="list-group-item list-group-item-action"
                                            id="{{ $categoria->idcategoria }}" onclick="">
                                            <strong>{{ $categoria->descripcion }}</strong>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <h2>Galerías de imágenes</h2>
                    <p>

                    </p>

                    <div class="lightBoxGallery">
                        @foreach ($Imagenes as $imagen)
                            <a href="{{ $imagen->imagen }}" title="Imágenes" data-gallery="">
                                <img src="{{ $imagen->imagen }}" width="80"></a>
                        @endforeach

                        <div id="blueimp-gallery" class="blueimp-gallery">
                            <div class="slides"></div>
                            <h3 class="title"></h3>
                            <a class="prev">‹</a>
                            <a class="next">›</a>
                            <a class="close">×</a>
                            <a class="play-pause"></a>
                            <ol class="indicator"></ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
