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
            <li class="breadcrumb-item">
                <a href="index.html">Nuevo</a>
            </li>
        </ol>
    </div>
@endsection

@section('content')
    @csrf

    <div class="btn-group">
        <a href="{{ url('/servicios/agua/') }}"> <button class="btn btn-secondary">Regresar</button></a>
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
                                <label class="control-label" for="txtMontoReciboAgua">Monto Recibo:</label>
                                <input type="number" class="form-control" step="0.05" name="txtMontoReciboAgua"
                                    id="txtMontoReciboAgua" value="0.00">
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
                                <input class="form-control" type="file" id="formFile" name="formFile" accept="image/*">
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
                    <h5><i class="fa fa-tint" aria-hidden="true"></i> Detalle por piso</h5>
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
                                    <button class="btn btn-primary w-100 btn-lg mt-3" onclick="agregarFilaAgua()">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-secondary w-100 btn-lg p-4" onclick="calcularAgua();">
                                        <i class="fa fa-calculator" aria-hidden="true"></i>
                                        Calcular
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="overflow-y: scroll; height:161px">
                                <ul class="list-group" id="pisoslistAgua">
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
                    <div class="btn-group">
                        <button class="btn btn-success btn-lg w-100" onclick="registrarAgua();">Registrar</button>
                        <button class="btn btn-danger btn-lg w-100" onclick="limpiarfrmAgua();">Limpiar</button>
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


        inputFile.addEventListener('input', async (event) => {
            let imgblob = await comprimirImagen(inputFile.files[0], 25);
            let srcimg = URL.createObjectURL(imgblob);
            base64URL = await encodeFileAsBase64URL(imgblob);
            image.setAttribute('src', base64URL);
        });

        const eliminarFila = (elemento) => {
            var id = elemento.parentNode.getAttribute("id");
            node = document.getElementById(id);
            node.parentNode.removeChild(node);
        }

        const agregarFilaAgua = () => {

            let txtCantPersonas = document.getElementById('txtCantPersonas').value;
            let Idpiso = document.getElementById('cbopiso').value;
            let Textpiso = document.getElementById('cbopiso').options[document.getElementById('cbopiso')
                    .selectedIndex]
                .text;
            let idPisoPersona = Idpiso + "," + txtCantPersonas;


            if (txtCantPersonas <= 0) {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        // progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 3000
                    };
                    toastr.warning('No se puede agregar cantidades menores a 1',
                        'Registro de imágenes');

                }, 500);
                return;
            }

            let contval = 0;

            document.getElementById('pisoslistAgua').querySelectorAll('li input').forEach((x) => {
                let piso = x.id.split(',')[0];

                if (piso == Idpiso) {
                    contval++;
                }
            });

            if (contval > 0) {

                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        // progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 3000
                    };
                    toastr.warning('No se puede volver a agregar 2 veces el piso',
                        'Registro de imágenes');

                }, 500);

            } else {
                document.getElementById('pisoslistAgua').innerHTML +=
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

        const calcularAgua = () => {

            let MontoReciboAgua = document.getElementById('txtMontoReciboAgua').value;
            let cantPisPer = document.getElementById('pisoslistAgua').querySelectorAll('li');

            if (cantPisPer.length <= 0) {

                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        // progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 3000
                    };
                    toastr.warning('Se debe tener una fila del detalle de piso y persona',
                        'Registro de imágenes');

                }, 500);
                return;
            } else {

                if (parseInt(MontoReciboAgua) <= 0) {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            // progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 3000
                        };
                        toastr.warning('El recibo no puede tener un monto menor o igual a 0.00',
                            'Registro de imágenes');

                    }, 500);
                    return;
                } else {
                    let sumaPersonas = 0;

                    let rowsTable = document.getElementById('tbldetalle').rows;

                    for (let index = 0; index < cantPisPer.length; index++) {
                        let cantPer = parseInt(cantPisPer[index].id);
                        sumaPersonas = sumaPersonas + cantPer;
                    }
                    console.log(sumaPersonas);

                    $('#tbldetalle').empty();
                    document.getElementById('pisoslistAgua').querySelectorAll('li input').forEach(x => {
                        let valores = x.id.split(',');
                        let MontoxPers = ((MontoReciboAgua - 20) / (sumaPersonas - 1));
                        document.getElementById('tbldetalle').insertRow(-1).innerHTML =
                            '<td style="display:none">' +
                            valores[0] + '</td><td>' +
                            x.value + '</td><td>' +
                            valores[1] + '</td><td>' +
                            (valores[0] == '2' ? 20 : round(MontoxPers, 2)) + '</td><td>' +
                            round((valores[0] == '2' ? 20 : round(MontoxPers, 2)) * valores[1], 2) +
                            '</td>';
                    });
                }
            }
        }

        const registrarAgua = () => {

            let idmes = document.getElementById('cbomes').value;
            let idanio = document.getElementById('cboanio').value;
            let montorecibo = document.getElementById('txtMontoReciboAgua').value;
            let comentario = document.getElementById('txtComentarios').value;
            let imagen = document.getElementById('imagenPrevisualizacion').src;
            let rowsTable = document.getElementById('tbldetalle').rows;
            let consumodetalle = [];

            let consumo = {
                idanio: idanio,
                idmes: idmes,
                montorecibo: montorecibo,
                comentario: comentario,
                imagen: imagen
            }

            for (let index = 0; index < rowsTable.length; index++) {
                let row = {
                    idpiso: rowsTable[index].querySelectorAll('td')[0].innerText,
                    cantpersonas: rowsTable[index].querySelectorAll('td')[2].innerText,
                    montoxpersona: rowsTable[index].querySelectorAll('td')[3].innerText,
                    montoxpiso: rowsTable[index].querySelectorAll('td')[4].innerText
                }
                consumodetalle.push(row);
            }

            console.log(consumo);
            console.log(consumodetalle);

            $.ajax({
                url: "{{ route('servicios.saveagua') }}",
                method: 'Post',
                data: {
                    '_token': $("input[name='_token']").val(),
                    'consumo': consumo,
                    'consumodetalle': consumodetalle,
                }
            }).done(function(data) {
                if (data > 0) {
                    // console.log(data);
                    limpiarfrmAgua();
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            // progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 3000
                        };
                        toastr.success('El recibo se registró correctamente',
                            'Registro de imágenes');
                    }, 500);
                }
            });
        }


        const limpiarfrmAgua = () => {
            var noImg = "{{ asset('../resources/img/Noimage.png') }}";
            let cantinput = $('input[type="number"]');
            let cantselect = $('select');
            let canttextarea = $('textarea');

            $('#pisoslistAgua').empty();
            $('#tbldetalle').empty();
            $('#formFile').val('');
            $('#imagenPrevisualizacion').attr('src', noImg);

            for (let index = 0; index < cantinput.length; index++) {
                $('input[type="number"]')[index].value = '';
            }

            for (let index = 0; index < cantselect.length; index++) {
                $('select')[index].selectedIndex = 0;
            }

            for (let index = 0; index < canttextarea.length; index++) {
                $('textarea')[index].value = '';
            }
        }
    @endsection
</script>
