@extends('layouts.plantilla')

@section('title', 'Servicios')

@section('header')
    <div class="col-lg-10">
        <h2>Servicios</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Servicios</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Luz</a>
            </li>
        </ol>
    </div>
@endsection

@section('content')

    <div class="d-flex align-content-center">
        <a href="{{ url('/servicios/luz/crear/') }}"> <button class="btn btn-success col-md-12"><i class="fa fa-file-o"
                    aria-hidden="true"></i> Nuevo registro</button></a>
    </div>



    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-filter" aria-hidden="true"></i>
                        Filtros</h5>
                </div>
                <div class="ibox-content animated fadeInRight">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="cbomes">Mes:</label>
                                <select class="form-select form-control" id="cbomes" name="cbomes">
                                    @foreach ($Meses as $Mes)
                                    <option value="{{ $Mes->idmes }}">{{ $Mes->descripcion }}</option>
                                @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="cboanio">Año:</label>
                                <select class="form-select form-control" id="cboanio" name="cboanio">
                                    @foreach ($Anios as $Anio)
                                        <option value="{{ $Anio->idanio }}">{{ $Anio->descripcion }}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>
                        <div class="col-md-12  col-sm-12 align-self-center">
                           <a href="{{url('servicios/filtrarluz/4/2')}}"> <button class="btn btn-primary btn-lg w-100 mt-3"><i class="fa fa-terminal"
                                    aria-hidden="true"></i>
                                Buscar</button></a>
                        </div>
                        {{-- <div class="col-md-6  col-sm-6 align-self-center">
                            <a href="{{ url('/servicios/luz/crear/') }}"> <button
                                    class="btn btn-success btn-lg w-100 mt-3"><i class="fa fa-file-o"
                                        aria-hidden="true"></i> Nuevo</button></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                        Datos Generales</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content animated fadeInRight">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="txtCargo">Total Consumo Kw:</label>
                                        <input type="email" class="form-control" name="txtTotalConsumo" value="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="txtOrganizacion">Precio x Kw:</label>
                                        <input type="text" class="form-control" name="txtPrecioxKW" value="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="txtOrganizacion">Cargos fijos, etc:</label>
                                        <input type="text" class="form-control" name="txtCargosFijos" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="txtOrganizacion">Cargos Fraccionamiento:</label>
                                        <input type="text" class="form-control" name="txtCargosFraccionamiento" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="txtOrganizacion">IGV:</label>
                                        <input type="text" class="form-control" name="txtIGV" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="txtOrganizacion">Total Consumo del mes.:</label>
                                        <input type="text" class="form-control text-danger" name="txtTotalConsumo"
                                            value="256.35" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group text-center">
                                <h5>Imágen Recibo</h5>
                                <div id="links">
                                    <a href="{!! asset('../resources/img/recibo.jpg') !!}" title="recibo">
                                        <img src="{!! asset('../resources/img/recibo.jpg') !!}" width="85" alt="recibo" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-contain" aria-label="image gallery"
        aria-modal="true" role="dialog">
        <div class="slides" aria-live="polite"></div>
        <h3 class="title"></h3>
        <a class="prev" aria-controls="blueimp-gallery" aria-label="previous slide" aria-keyshortcuts="ArrowLeft"></a>
        <a class="next" aria-controls="blueimp-gallery" aria-label="next slide" aria-keyshortcuts="ArrowRight"></a>
        <a class="close" aria-controls="blueimp-gallery" aria-label="close" aria-keyshortcuts="Escape"></a>
        <a class="play-pause" aria-controls="blueimp-gallery" aria-label="play slideshow" aria-keyshortcuts="Space"
            aria-pressed="false" role="button"></a>
        <ol class="indicator"></ol>
    </div>

@endsection
