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
                <a href="index.html">Memorias</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Frases</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Crear</a>
            </li>
        </ol>
    </div>
@endsection

@section('content')
    @csrf

    <div class="btn-group">
        <a href="{{ url('/memorias/frases/') }}"> <button class="btn btn-secondary">Regresar</button></a>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <div class="ibox float-e-margins animated fadeInRight">
                <div class="ibox-title">
                    <h5><i class="fa fa-calendar" aria-hidden="true"></i> Periodo</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">

                        <div class="col-md-12">
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
                                <label class="control-label" for="txtMontoReciboInternet">Monto Recibo:</label>
                                <input type="number" class="form-control" step="0.05" name="txtMontoReciboInternet"
                                    id="txtMontoReciboInternet" value="0.00">
                            </div>
                        </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox float-e-margins animated fadeInRight">
                <div class="ibox-title">
                    <h5><i class="fa fa-globe" aria-hidden="true"></i> Detalle por piso</h5>
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
                                    {{-- <div class="form-group">
                                        <label for="cbousuario">Piso:</label>
                                        <select class="form-select form-control" id="cbopiso" name="cbopiso">
                                            @foreach ($Pisos as $Piso)
                                                <option value="{{ $Piso->idpiso }}">{{ $Piso->descripcion }}</option>
                                            @endforeach
                                        </select>

                                    </div> --}}
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
                                                        <th>Monto x Piso</th>
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

<script>
    @section('functions')
        const inputFile = document.querySelector('#formFile');
        const image = document.querySelector('#imagenPrevisualizacion');
        var base64URL = "";

        function round(value, decimals) {
            return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
        }

        async function encodeFileAsBase64URL(file) {
            return new Promise((resolve) => {
                const reader = new FileReader();
                reader.addEventListener('loadend', () => {
                    resolve(reader.result);
                });
                reader.readAsDataURL(file);
            });
        };

        inputFile.addEventListener('input', async (event) => {
            base64URL = await encodeFileAsBase64URL(inputFile.files[0]);
            image.setAttribute('src', base64URL);
        });

        const eliminarFila = (elemento) => {
            var id = elemento.parentNode.getAttribute("id");
            node = document.getElementById(id);
            node.parentNode.removeChild(node);
        }

        const agregarFila = () => {

            let txtCantPersonas = document.getElementById('txtCantPersonas').value;
            let Idpiso = document.getElementById('cbopiso').value;
            let Textpiso = document.getElementById('cbopiso').options[document.getElementById('cbopiso')
                    .selectedIndex]
                .text;
            let idPisoPersona = Idpiso + "," + txtCantPersonas;


            if (txtCantPersonas <= 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Alerta',
                    text: 'No se puede agregar cantidades menores a 1',
                });
                return;
            }

            let contval = 0;

            document.getElementById('pisoslist').querySelectorAll('li input').forEach((x) => {
                let piso = x.id.split(',')[0];

                if (piso == Idpiso) {
                    contval++;
                }
            });

            if (contval > 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Alerta',
                    text: 'No se puede volver a agregar 2 veces el piso',
                });
            } else {
                document.getElementById('pisoslist').innerHTML +=
                    '<li class="list-group-item" id="' + txtCantPersonas +
                    ' "><span class="label label-danger" style="margin-right:5px !important;" onclick="eliminarFila(this)"><i class="fa fa-trash" aria-hidden="true"></i></span><input type="text" id="' +
                    idPisoPersona +
                    '" style="display:none" value="' + Textpiso +
                    '" disabled /><strong ><i class="fa fa-check" aria-hidden="true"></i> Lugar: </strong>' +
                    Textpiso +
                    '  <span style="margin-left:10px !important;">-</span>  <strong style="margin-left:10px !important;"><i class="fa fa-user" aria-hidden="true"></i> Personas: </strong>' +
                    txtCantPersonas + ' </li>';

                txtCantPersonas.value = '';
                document.getElementById('txtCantPersonas').focus();
            }
        }

        const calcular = () => {
            let MontoReciboAgua = document.getElementById('txtMontoReciboInternet').value;
            let cantPisPer = document.getElementById('pisoslist').querySelectorAll('li').length;

            if (cantPisPer <= 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Alerta',
                    text: 'Se debe tener una fila del detalle de piso y persona',
                });
                return;
            }

            if (parseInt(MontoReciboAgua) <= 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Alerta',
                    text: 'El recibo no puede tener un monto menor o igual a 0.00',
                });
                return;
            }

            let sumaPersonas = 0;
            document.getElementById('pisoslist').querySelectorAll('li input').forEach((x) => {
                let persona = x.id.split(',')[1];
                sumaPersonas = sumaPersonas + parseInt(persona);
            });
            console.log({
                MontoReciboAgua
            });
            console.log({
                sumaPersonas
            });

            $('#tbldetalle').empty();
            document.getElementById('pisoslist').querySelectorAll('li input').forEach(x => {
                let valores = x.id.split(',');
                let MontoxPers = (MontoReciboAgua / cantPisPer);
                document.getElementById('tbldetalle').insertRow(-1).innerHTML =
                    '<td style="display:none">' +
                    valores[0] + '</td><td>' +
                    x.value + '</td><td>' +
                    valores[1] + '</td><td>' +
                    round(MontoxPers / valores[1], 2) + '</td><td>' +
                    round((MontoxPers / valores[1]) * valores[1], 2) + '</td>';
            });


        }
    @endsection
</script>
