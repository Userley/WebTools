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
    @csrf
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
                        <input type="number" class="form-control" step="0.05" id="txtConsumoRecibo" required=true>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtCosto">S/ Costo Kwh:</label>
                        <input type="number" class="form-control" step="0.05" id="txtCosto">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtCargosFijos">S/ Cargos fijos, etc:</label>
                        <input type="number" class="form-control" step="0.05" id="txtCargosFijos" value="26.00">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtFraccionamiento">Fraccionamiento:</label>
                        <input type="number" class="form-control" step="0.05" id="txtFraccionamiento" value="0.00">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtIGV">IGV:</label>
                        <input type="number" class="form-control" step="0.05" id="txtIGV" value="18">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="txtMontoMes">Monto recibo mes:</label>
                        <input type="number" class="form-control" step="0.05" id="txtMontoMes">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ibox float-e-margins animated fadeInRight">
        <div class="ibox-title">
            <h5><i class="fa fa-th" aria-hidden="true"></i>
                Detalle x Piso</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row" id="datosDetalle">
                <div class="col-md-4">
                    <div class="row">

                        <div class="col-md-6">
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
                                <label for="cbousuario">Piso:</label>
                                <select class="form-select form-control" id="cbopiso" name="cboanio">
                                    @foreach ($Pisos as $Piso)
                                        <option value="{{ $Piso->idpiso }}">{{ $Piso->descripcion }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="txtUltimaMedida">Última medida:</label>
                                <input type="number" class="form-control" step="0.05" name="txtUltimaMedida"
                                    id="txtUltimaMedida">
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
                                    <table class="table table-striped w-100">
                                        <thead class="text-center small">
                                            <tr>
                                                <th>Acción</th>
                                                <th>Lugar</th>
                                                <th>Mes</th>
                                                <th>Año</th>
                                                <th>Kwh Actual</th>
                                                <th>Cargo Fijos</th>
                                                <th>Fraccionamiento</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center small" id="tbldetalle">
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
            <button class="btn btn-success" onclick="GuardarRegistros();">Registrar</button>
            <button type="reset" class="btn btn-danger">Limpiar</button>
            <a href="{{ url('/servicios/luz/') }}"> <button class="btn btn-secondary">Regresar</button></a>
        </div>
    @endsection



    <script>
        const agregarFila = () => {

            let CosumoRecibido = document.getElementById('txtConsumoRecibo').value;
            let CostoKw = document.getElementById('txtCosto').value;
            let CargoFijo = document.getElementById('txtCargosFijos').value;
            let Fraccionamiento = document.getElementById('txtFraccionamiento').value;
            let IGV = document.getElementById('txtIGV').value;
            let MontoMes = document.getElementById('txtMontoMes').value;

            let Idmes = document.getElementById('cbomes').value;
            let Textmes = document.getElementById('cbomes').options[document.getElementById('cbomes').selectedIndex]
                .text;

            let Idanio = document.getElementById('cboanio').value;
            let Textanio = document.getElementById('cboanio').options[document.getElementById('cboanio').selectedIndex]
                .text;

            let Idpiso = document.getElementById('cbopiso').value;
            let Textpiso = document.getElementById('cbopiso').options[document.getElementById('cbopiso').selectedIndex]
                .text;

            let medida = document.getElementById('txtUltimaMedida').value;

            if (medida == '' || medida == null || CosumoRecibido == '' || CostoKw == '' || CargoFijo == '' ||
                Fraccionamiento == '' || IGV == '' || MontoMes == '') {
                Swal.fire({
                    icon: 'info',
                    title: 'Alerta',
                    text: 'Debe llenar todos los campos',
                });
                return;
            }

            for (let index = 0; index < document.getElementById('tbldetalle').rows.length; index++) {
                let idPi = document.getElementById('tbldetalle').rows[index].querySelectorAll('td')[1].innerHTML;
                if (Idpiso == idPi) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '¡No se puede ingresar 2 veces un mismo Piso!',
                    })
                    return;
                }
            }

            let cont = document.getElementById('tbldetalle').rows.length + 1

            document.getElementById('tbldetalle').insertRow(-1).innerHTML =
                '<td><button class="btn btn-sm btn-danger" onclick="eliminarFila(this)"><i class="fa fa-trash" aria-hidden="true"></i></button></td><td style="display:none">' +
                Idpiso + '</td><td>' +
                Textpiso + '</td><td style="display:none">' +
                Idmes + '</td><td>' +
                Textmes + '</td><td style="display:none">' +
                Idanio + '</td><td>' +
                Textanio + '</td><td>' +
                medida + '</td><td>' +
                medida + '</td><td>' +
                medida + '</td>';
        }

        const eliminarFila = (id) => {
            var cell = id.parentNode;
            var row = cell.parentNode;
            const table = document.getElementById('tbldetalle')
            const rowCount = table.rows.length;

            if (rowCount < 1) {
                alert('No se puede eliminar el encabezado')
            } else {

                table.deleteRow(row.rowIndex - 1);
            }
        }



        const GuardarRegistros = () => {
            let c = 0;
            document.querySelectorAll('input[type="number"]').forEach((x) => {
                if (x.value == '') {
                    $('#' + x.id).addClass('is-invalid');
                    c++;
                } else {
                    $('#' + x.id).removeClass('is-invalid');
                }
            });

            if (c != 0) {
                Swal.fire({
                    icon: 'info',
                    title: 'Alerta',
                    text: 'Debe llenar todos los campos',
                });
                return;
            }

            if (document.getElementById('tbldetalle').rows.length <= 0) {
                Swal.fire({
                    icon: 'info',
                    title: 'Alerta',
                    text: 'Debe tener al menos registrado un piso.',
                });
                return;
            }


            let CosumoRecibido = document.getElementById('txtConsumoRecibo').value;
            let CostoKw = document.getElementById('txtCosto').value;
            let CargoFijo = document.getElementById('txtCargosFijos').value;
            let Fraccionamiento = document.getElementById('txtFraccionamiento').value;
            let IGV = document.getElementById('txtIGV').value;
            let MontoMes = document.getElementById('txtMontoMes').value;


            var cabecera = {
                'consumoKwh': CosumoRecibido,
                'costoKwh': CostoKw,
                'cargoFijo': CargoFijo,
                'fraccionamiento': Fraccionamiento,
                'igv': IGV,
                'montoMes': MontoMes
            }

            var detalle = [];

            let rows = document.getElementById('tbldetalle').querySelectorAll('tr');

            for (let index1 = 0; index1 < rows.length; index1++) {

                let tds = rows[index1].querySelectorAll('td');

                let obj = {
                    'idpiso': rows[index1].querySelectorAll('td')[1].innerHTML,
                    'idmes': rows[index1].querySelectorAll('td')[3].innerHTML,
                    'idanio': rows[index1].querySelectorAll('td')[5].innerHTML,
                    'kwhActual': rows[index1].querySelectorAll('td')[7].innerHTML,
                    'cargofijo': rows[index1].querySelectorAll('td')[8].innerHTML,
                    'fraccionamiento': rows[index1].querySelectorAll('td')[9].innerHTML,
                };

                detalle.push(obj);
            }

            // console.log(detalle);

            $.ajax({
                url: "{{ route('servicios.saveluz') }}",
                method: 'POST',
                data: {
                    '_token': $("input[name='_token']").val(),
                    'cabecera': cabecera,
                    'detalle': detalle,
                }
            }).done(function(data) {

                console.log(data);
            });


        }
    </script>
