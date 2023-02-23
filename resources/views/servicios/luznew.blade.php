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
    <div class="ibox float-e-margins animated fadeInRight">
        <div class="ibox-title">
            <h5><i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                Datos Recibo</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">

            <div class="row" id="datosRecibo">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtConsumoRecibo">Consumo Recibo Kwh:</label>
                        <input type="number" class="form-control" step="0.05" name="txtConsumoRecibo">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtCosto">S/ Costo Kwh:</label>
                        <input type="number" class="form-control" step="0.05" name="txtCosto">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtCargosFijos">S/ Cargos fijos, etc:</label>
                        <input type="number" class="form-control" step="0.05" name="txtCargosFijos">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtFraccionamiento">Fraccionamiento:</label>
                        <input type="number" class="form-control" step="0.05" name="txtFraccionamiento">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtIGV">IGV:</label>
                        <input type="number" class="form-control" step="0.05" name="txtIGV">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtMontoMes">Monto recibo mes:</label>
                        <input type="number" class="form-control" step="0.05" name="txtMontoMes">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ibox float-e-margins animated fadeInRight">
        <div class="ibox-title">
            <h5><i class="fa fa-th" aria-hidden="true"></i>
                Detalle x Usuario</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cbomes">Mes:</label>
                                <select class="form-select form-control" id="cbomes" name="cbomes">
                                    <option selected>Seleccione mes</option>
                                    <option value="1">Enero</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cboanio">Año:</label>
                                <select class="form-select form-control" id="cboanio" name="cboanio">
                                    <option selected>Seleccione año</option>
                                    <option value="1">2023</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cbousuario">Piso:</label>
                                <select class="form-select form-control" id="cbopiso" name="cboanio">
                                    <option selected>Seleccione piso</option>
                                    <option value="1">1er Piso</option>
                                    <option value="1">2do Piso</option>
                                    <option value="1">Cochera</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="txtUltimaMedida">Última medida:</label>
                                <input type="number" class="form-control" step="0.05" name="txtUltimaMedida">
                            </div>
                        </div>
                        <div class="col-md-12 align-self-center">
                            <button class="btn btn-primary btn-lg w-100 mt-3" onclick="agregarFila()"><i
                                    class="fa fa-plus" aria-hidden="true"></i>
                                Agregar</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="wrapper wrapper-content animated fadeInRight">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="ibox float-e-margins">
                                    <table class="table table-striped w-100" id="tbldetalle">
                                        <thead class="text-center">
                                            <tr>
                                                <th>Acción</th>
                                                <th>Item</th>
                                                <th>Lugar</th>
                                                <th>Mes</th>
                                                <th>Año</th>
                                                <th>Kwh Actual</th>
                                                <th>Cargo Fijos</th>
                                                <th>Fraccionamiento</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="btn-group">
            <input type="submit" value="Registrar" class="btn btn-success" onclick="validarControles();">
            <button type="reset" class="btn btn-danger">Limpiar</button>
            <a href="{{ url('/servicios/luz/') }}"> <input type="button" value="Regresar"
                    class="btn btn-secondary"></a>
        </div>
    @endsection



    <script>
        const validarControles = () => {

            // let ConsumoRecibo = document.getElementById('txtConsumoRecibo').value;
            // let Costo = document.getElementById('txtCosto').value;
            // let CargosFijos = document.getElementById('txtCargosFijos').value;
            // let Fraccionamiento = document.getElementById('txtFraccionamiento').value;
            // let IGV = document.getElementById('txtIGV').value;
            // let MontoMes = document.getElementById('txtMontoMes').value;

            let inputs = document.getElementById('datosRecibo').querySelectorAll('input');

            inputs.forEach((x) => {
                let c = 0;
                if (x.value == '') {
                    console.log(x.name);
                    document.getElementsByName(x.name).required = true;
                    c++;
                };

                if (c > 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Debe llenar todos los campos!',
                    })
                    return;
                }
            })

        }


        const agregarFila = () => {
            let cont = document.getElementById('tbldetalle').rows.length
            document.getElementById('tbldetalle').insertRow(-1).innerHTML =
                '<td><button class="btn btn-sm btn-danger" onclick="eliminarFila(this)"><i class="fa fa-trash" aria-hidden="true"></i></button></td><td>' +
                cont +
                '</td><td>Cochera</td><td>Marzo</td><td>2023</td><td>2654.75</td><td>0.00</td><td>0.00</td>';
        }

        const eliminarFila = (id) => {
            var cell = id.parentNode;
            var row = cell.parentNode;
            const table = document.getElementById('tbldetalle')
            const rowCount = table.rows.length

            if (rowCount <= 1) {
                alert('No se puede eliminar el encabezado')
            } else {

                table.deleteRow(row.rowIndex);
            }
        }
    </script>
