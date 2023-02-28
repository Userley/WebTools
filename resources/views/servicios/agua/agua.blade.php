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
        <div class="col-md-3">
            <div class="ibox float-e-margins animated fadeInRight">
                <div class="ibox-title">
                    <h5><i class="fa fa-filter" aria-hidden="true"></i>
                        Filtros</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="overflow-y: scroll; height:180px">
                                <ul class="list-group" id="listafechas">
                                    @foreach ($ConsumosAgua as $Consumo)
                                        <li class="list-group-item list-group-item-action"
                                            id="{{ $Consumo->idanio }}-{{ $Consumo->idmes }}" onclick="filtrar(event)">
                                            <strong><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                {{ $Consumo->anio }}</strong> -
                                            {{ $Consumo->mes }}
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
            <div class="ibox float-e-margins animated fadeInRight">
                <div class="ibox-title">
                    <h5><i class="fa fa-tint" aria-hidden="true"></i> Detalle consumo</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group text-center">
                                <h5>Imágen Recibo</h5>
                                <div id="links">
                                    <a id="imgreciboTemp" href="{!! asset('../resources/img/Noimage.png') !!}" title="recibo">
                                        <img id="imgrecibo" src="{!! asset('../resources/img/Noimage.png') !!}" width="100" alt="recibo" />
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wrapper wrapper-content animated fadeInRight m-0 p-0">
                                <div class="ibox float-e-margins">
                                    <div class="table-responsive">
                                        <table class="table ">
                                            <thead class="text-center">
                                                <tr>
                                                    <th>Piso</th>
                                                    <th>Personas</th>
                                                    <th>Monto x Pers.</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbldetalle" class="text-center">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="txtMontoReciboAgua">Monto Recibo:</label>
                                        <input type="text" class="form-control" step="1" name="txtMontoReciboAgua"
                                            id="txtMontoReciboAgua" disabled value="0">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="txtComentarios">Comentarios:</label>
                                        <textarea class="form-control" id="txtComentarios" rows="2" disabled></textarea>
                                    </div>
                                </div>
                            </div>
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

    <script>
        function round(value, decimals) {
            return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
        }

        function filtrar(e) {
            var fechaanio = e.target.id.split('-');

            document.getElementById('listafechas').querySelectorAll('li').forEach(x => {
                $("#" + x.id).removeClass('active')
            })

            $("#" + e.target.id).addClass('active')


            $.ajax({
                url: "{{ route('servicios.filtraragua') }}",
                method: 'Get',
                data: {
                    '_token': $("input[name='_token']").val(),
                    'idmes': fechaanio[1],
                    'idanio': fechaanio[0],
                }
            }).done(function(data) {
                var datos = JSON.parse(data);
                // console.log(data);
                var noImg = "{{ asset('../resources/img/Noimage.png') }}";
                if (datos.length > 0) {

                    if (datos[0].Cabecera[0].image == null || datos[0].Cabecera[0].image == '') {
                        datos[0].Cabecera[0].image = noImg;
                    }

                    $('#txtMontoReciboAgua').val("S/ " + round(datos[0].Cabecera[0].costototalconsumo, 2));
                    $('#txtComentarios').val(datos[0].Cabecera[0].comentarios);

                    $('#tbldetalle').empty();

                    datos[0].Detalle.sort(function(a, b) {
                        return a.idpiso - b.idpiso;
                    });

                    datos[0].Detalle.forEach(function(x) {
                        // console.log(x.idpiso);
                        let html =
                            '<tr class="animated fadeInUp"><td><strong class="text-success">' +
                            x.descripcion + '</strong></td><td>' +
                            x.cantpersonas + '</td><td>' +
                            "S/ " + round(x.montoxpersona, 2) +
                            '</td><td><strong class="text-danger">' +
                            "S/ " + round(x.subtotal, 2) + '</strong></td><tr>';


                        $('#tbldetalle').append(html);
                    });

                } else {

                    $('#txtMontoReciboAgua').val('S/ 00.00');
                    $('#txtComentarios').val();
                    // $('#tbldetalle').empty();
                }

                // console.log(datos);
            });
        };
    </script>

@endsection
