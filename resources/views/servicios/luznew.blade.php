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
            <li class="breadcrumb-item">
                <a href="index.html">Nuevo</a>
            </li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                Datos Recibo</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content animated fadeInRight">

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtCargo">Consumo Recibo Kwh:</label>
                        <input type="number" class="form-control" step="0.05" name="txtConsumoRecibo">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtOrganizacion">S/ Costo Kwh:</label>
                        <input type="number" class="form-control" step="0.05" name="txtCosto">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtOrganizacion">S/ Cargos fijos, etc:</label>
                        <input type="number" class="form-control" step="0.05" name="txtCargosFijos">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtOrganizacion">Fraccionamiento:</label>
                        <input type="number" class="form-control" step="0.05" name="txtFraccionamiento">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtOrganizacion">IGV:</label>
                        <input type="number" class="form-control" step="0.05" name="txtIGV">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtOrganizacion">Monto recibo mes:</label>
                        <input type="number" class="form-control" step="0.05" name="txtMontoMes">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><i class="fa fa-th" aria-hidden="true"></i>
                Detalle x Usuario</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content animated fadeInRight">

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="cbousuario">Usuario:</label>
                        <select class="form-select form-control" id="cbousuario" name="cboanio">
                            <option selected>Seleccione año</option>
                            <option value="1">2023</option>
                        </select>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cbomes">Mes:</label>
                        <select class="form-select form-control" id="cbomes" name="cbomes">
                            <option selected>Seleccione mes</option>
                            <option value="1">Enero</option>
                        </select>

                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="cboanio">Año:</label>
                        <select class="form-select form-control" id="cboanio" name="cboanio">
                            <option selected>Seleccione año</option>
                            <option value="1">2023</option>
                        </select>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="txtOrganizacion">Última medida:</label>
                        <input type="number" class="form-control" step="0.05" name="txtFraccionamiento">
                    </div>
                </div>

                <div class="col-md-2 align-self-center">
                    <button class="btn btn-secondary btn-lg w-100 mt-3"><i class="fa fa-plus" aria-hidden="true"></i>
                        Agregar</button>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">

                                <table class="table table-striped w-100">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Lugar</th>
                                            <th>Usuario</th>
                                            <th>Mes</th>
                                            <th>Año</th>
                                            <th>Kwh Actual</th>
                                            <th>Cargo Fijos</th>
                                            <th>Fraccionamiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>2do Piso</td>
                                            <td>Erick</td>
                                            <td>Marzo</td>
                                            <td>2023</td>
                                            <td>2854.60</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>1er Piso</td>
                                            <td>Yris</td>
                                            <td>Marzo</td>
                                            <td>2023</td>
                                            <td>3495.86</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Cochera</td>
                                            <td>Nelson</td>
                                            <td>Marzo</td>
                                            <td>2023</td>
                                            <td>2654.75</td>
                                            <td>0.00</td>
                                            <td>0.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="btn-group">
            <input type="submit" value="Registrar" class="btn btn-success">
            <button type="reset" class="btn btn-danger">Limpiar</button>
            <a href="{{ url('/servicios/luz/') }}"> <input type="button" value="Regresar"
                    class="btn btn-secondary"></a>
        </div>
    @endsection
