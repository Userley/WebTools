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
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><i class="fa fa-filter" aria-hidden="true"></i>
                Filtros</h5>
        </div>
        <div class="ibox-content animated fadeInRight">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cbomes">Mes:</label>
                        <select class="form-select form-control" id="cbomes" name="cbomes">
                            <option selected>Seleccione mes</option>
                            <option value="1">Enero</option>
                        </select>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cboanio">Año:</label>
                        <select class="form-select form-control" id="cboanio" name="cboanio">
                            <option selected>Seleccione año</option>
                            <option value="1">2023</option>
                        </select>

                    </div>
                </div>
                <div class="col-md-2 align-self-center">
                    <button class="btn btn-primary btn-lg w-100 mt-3"><i class="fa fa-terminal" aria-hidden="true"></i>
                        Buscar</button>
                </div>
                <div class="col-md-2 align-self-center">
                    <a href="{{ url('/servicios/luz/crear/') }}"> <button class="btn btn-success btn-lg w-100 mt-3"><i
                                class="fa fa-file-o" aria-hidden="true"></i> Nuevo</button></a>
                </div>
            </div>
        </div>
    </div>
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
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="txtCargo">Total Consumo Kw:</label>
                                <input type="email" class="form-control" name="txtTotalConsumo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="txtOrganizacion">Precio x Kw:</label>
                                <input type="text" class="form-control" name="txtPrecioxKW">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="txtOrganizacion">Cargos fijos, alumbrado, etc:</label>
                                <input type="text" class="form-control" name="txtCargosFijos">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="txtOrganizacion">Cargos Fraccionamiento:</label>
                                <input type="text" class="form-control" name="txtCargosFraccionamiento">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="txtOrganizacion">IGV:</label>
                                <input type="text" class="form-control" name="txtIGV">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="txtOrganizacion">Total Consumo del mes.:</label>
                                <input type="text" class="form-control" name="txtTotalConsumo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 ">
                    <div class="form-group text-center">
                        <h5>Imágen Recibo</h5>
                        <div id="links">
                            <a href="{!! asset('../resources/img/recibo.jpg') !!}" title="recibo">
                                <img src="{!! asset('../resources/img/recibo.jpg') !!}" width="150" alt="recibo" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-contain" aria-label="image gallery" aria-modal="true"
        role="dialog">
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
