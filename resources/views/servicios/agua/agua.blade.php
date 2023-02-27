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
                <a href="index.html">Agua</a>
            </li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="d-flex align-content-center">
        <a href="{{ url('/servicios/agua/crear/') }}"> <button class="btn btn-primary col-md-12"><i class="fa fa-file-o"
                    aria-hidden="true"></i> Nuevo registro</button></a>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="ibox float-e-margins animated fadeInRight">
                <div class="ibox-title">
                    <h5>Periodo</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="overflow-y: scroll; height:290px">
                                <ul class="list-group" id="listafechas">
                                    @foreach ($ConsumosAgua as $Consumo)
                                        <li class="list-group-item" id="{{ $Consumo->idanio }}-{{ $Consumo->idmes }}"
                                            onclick="">
                                            <strong><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                {{ $Consumo->anio }}</strong> -
                                            {{ $Consumo->mes }}
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        {{-- <div class="col-md-12">
                        <div class="form-group">
                            <label for="cbomes">Mes:</label>
                            <select class="form-select form-control" id="cbomes" name="cbomes">
                                @foreach ($Meses as $Mes)
                                    <option value="{{ $Mes->idmes }}">{{ $Mes->descripcion }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cboanio">Año:</label>
                            <select class="form-select form-control" id="cboanio" name="cboanio">
                                @foreach ($Anios as $Anio)
                                    <option value="{{ $Anio->idanio }}">{{ $Anio->descripcion }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txtMontoReciboAgua">Monto Recibo:</label>
                            <input type="number" class="form-control" step="0.05" name="txtMontoReciboAgua"
                                id="txtMontoReciboAgua" value="0.00">
                        </div>
                    </div> --}}
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label" for="txtComentarios">Comentarios:</label>
                                <textarea class="form-control" id="txtComentarios" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 align-self-center">
                            <hr>
                            <div class="form-group">
                                <label for="formFile" class="control-label">Imagen:</label>
                                <input class="form-control" type="file" id="formFile" name="formFile">
                            </div>
                            <div class="form-group mx-5">
                                <div class="text-center item">
                                    <img id="imagenPrevisualizacion" width="90" style="border-radius:0%">
                                </div>
                            </div>
                            {{-- <button class="btn btn-primary btn-lg w-100 mt-3" onclick="agregarFila()"><i class="fa fa-plus"
                                aria-hidden="true"></i>
                            Agregar</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox float-e-margins animated fadeInRight">
                <div class="ibox-title">
                    <h5>Detalle por piso</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="cbousuario">Piso:</label>
                                        <select class="form-select form-control" id="cbopiso" name="cbopiso">
                                            @foreach ($Pisos as $Piso)
                                                <option value="{{ $Piso->idpiso }}">{{ $Piso->descripcion }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for="txtCantPersonas">Personas:</label>
                                        <input type="number" class="form-control" step="1" name="txtCantPersonas"
                                            id="txtCantPersonas" value="0">
                                    </div>
                                </div>
                                <div class="col-md-3 align-self-center">
                                    <button class="btn btn-primary w-100 btn-lg mt-3" onclick="agregarFila()">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-secondary w-100 btn-lg p-4" onclick="calcular();">
                                        <i class="fa fa-calculator" aria-hidden="true"></i>
                                        Calcular
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="overflow-y: scroll; height:161px">
                                <ul class="list-group" id="pisoslist">
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                            <div class="wrapper wrapper-content animated fadeInRight m-0 p-0">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ibox float-e-margins">
                                            <table class="table table-striped w-100">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th>Piso</th>
                                                        <th>Cant. Personas</th>
                                                        <th>Monto x Pers.</th>
                                                        <th>Sub Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-center" id="tbldetalle">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button class="btn btn-success btn-lg w-25 " onclick="">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
