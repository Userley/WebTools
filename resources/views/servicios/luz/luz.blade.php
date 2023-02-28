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
        <a href="{{ url('/servicios/luz/crear/') }}"> <button class="btn btn-primary col-md-12"><i class="fa fa-file-o"
                    aria-hidden="true"></i> Nuevo registro</button></a>
    </div>


    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="ibox float-e-margins animated fadeInRight">
                <div class="ibox-title">
                    <h5><i class="fa fa-filter" aria-hidden="true"></i>
                        Filtros</h5>
                </div>

                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="overflow-y: scroll; height:290px">
                                <ul class="list-group" id="listafechas">
                                    @foreach ($Fechas as $Fecha)
                                        <li class="list-group-item list-group-item-action"
                                            id="{{ $Fecha->idanio }}-{{ $Fecha->idmes }}" onclick="filtrar(event)">
                                            <strong><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                {{ $Fecha->anio }}</strong> -
                                            {{ $Fecha->mes }}
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-8">

            <div class="ibox float-e-margins animated fadeInRight">
                <div class="ibox-title">
                    <h5><i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                        Datos Generales</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="txtTotalConsumo">Consumo Kw:</label>
                                        <input type="email" class="form-control" id="txtTotalConsumo" value=""
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="txtPrecioxKW">Precio x Kw:</label>
                                        <input type="text" class="form-control" id="txtPrecioxKW" value=""
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="txtCargosFijos">Cargos fijos, etc:</label>
                                        <input type="text" class="form-control" id="txtCargosFijos" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="txtCargosFraccionamiento">Fracc Deud.:</label>
                                        <input type="text" class="form-control" id="txtCargosFraccionamiento" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="txtIGV">IGV:</label>
                                        <input type="text" class="form-control" id="txtIGV" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="txtTotalConsumomes">Total mes.:</label>
                                        <input type="text" class="form-control text-danger fw-bolder"
                                            id="txtTotalConsumomes" disabled>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr>
                                    <div class="form-group">
                                        <label class="control-label" for="txtComentarios">Comentarios:</label>
                                        <textarea class="form-control" id="txtComentarios" rows="2" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group text-center">
                                <h5>Imágen Recibo</h5>
                                <div id="links">
                                    <a id="imgreciboTemp" href="{!! asset('../resources/img/Noimage.png') !!}" title="recibo">
                                        <img id="imgrecibo" src="{!! asset('../resources/img/Noimage.png') !!}" width="130"
                                            alt="recibo" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ibox float-e-margins animated fadeInRight">
        <div class="ibox-title">
            <h5><i class="fa fa-table" aria-hidden="true"></i>
                Detalle</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="small">
                        <th>Lugar</th>
                        <th>Medida Mes</th>
                        <th>Consumo Kwh</th>
                        <th>Cost. Admin.</th>
                        <th>Fracción Deu.</th>
                        <th>Monto S/IGV</th>
                        <th>Monto IGV</th>
                        <th>Monto C/IGV</th>
                        <th>Total Mes</th>
                        <th>Cálculo por persona</th>
                    <tbody id="detalleconsumo" class="small">

                    </tbody>
                </table>
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

<script>
    @section('ready')
        document.getElementById('links').onclick = function(event) {
            event = event || window.event
            var target = event.target || event.srcElement
            var link = target.src ? target.parentNode : target
            var options = {
                index: link,
                event: event
            }
            var links = this.getElementsByTagName('a')
            blueimp.Gallery(links, options)
        }
    @endsection

    @section('functions')
        function round(value, decimals) {
            return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
        }

        function Calcular(id, monto) {
            let Cant = $("#cant" + id).val();
            Cant = Cant == '' ? 1 : Cant;
            $("#resp" + id).val(round(monto / Cant, 2));
        }

        function filtrar(e) {
            var fechaanio = e.target.id.split('-');

            document.getElementById('listafechas').querySelectorAll('li').forEach(x => {
                $("#" + x.id).removeClass('active')
            })

            $("#" + e.target.id).addClass('active')


            $.ajax({
                url: "{{ route('servicios.filtrar') }}",
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

                    $('#txtTotalConsumo').val(datos[0].Cabecera[0].consumokwtotal + " Kwh");
                    $('#txtPrecioxKW').val("S/ " + parseFloat(datos[0].Cabecera[0].precioxkw));
                    $('#txtCargosFijos').val("S/ " + parseFloat(datos[0].Cabecera[0].costoadministrativo));
                    $('#txtCargosFraccionamiento').val("S/ " + parseFloat(datos[0].Cabecera[0]
                        .costofraccionamiento));
                    $('#txtIGV').val(parseInt(datos[0].Cabecera[0].igv) + " %");
                    $('#txtTotalConsumomes').val("S/ " + parseFloat(datos[0].Cabecera[0].costototalconsumo));
                    $('#imgrecibo').prop('src', datos[0].Cabecera[0].image);
                    $('#imgreciboTemp').prop('href', datos[0].Cabecera[0].image);
                    $('#txtComentarios').val(datos[0].Cabecera[0].comentarios);
                    $('#detalleconsumo').empty();

                    datos[0].Detalle.sort(function(a, b) {
                        return a.idpiso - b.idpiso;
                    });

                    datos[0].Detalle.forEach(function(x) {
                        // console.log(x.idpiso);
                        let html =
                            '<tr class="animated fadeInUp"><td><strong class="text-success">' +
                            x.descripcion + '</strong></td><td>' +
                            (x.medidakw == null ? "0" : x.medidakw) + ' Kwh</td><td>' +
                            "S/ " + parseFloat((x.consumokw == null ? "0" : x.consumokw)) +
                            '</td><td>' +
                            "S/ " + parseFloat((x.montocostoadministrativo == null ? "0" : x
                                .montocostoadministrativo)) +
                            '</td><td>' +
                            "S/ " + parseFloat((x.montopagofraccionado == null ? "0" : x
                                .montopagofraccionado)) + '</td><td>' +
                            "S/ " + parseFloat((x.montototalsinigv == null ? "0" : x
                            .montototalsinigv)) +
                            '</td><td>' +
                            "S/ " + parseFloat((x.montoigv == null ? "0" : x.montoigv)) + '</td><td>' +
                            "S/ " + parseFloat((x.montototalconigv == null ? "0" : x
                            .montototalconigv)) +
                            '</td><td><strong class="text-danger">' +
                            "S/ " + parseFloat((x.montototal == null ? "0" : x.montototal)) +
                            '</strong></td><td class="d-inline-flex p-0 m-0"><input type="number" value="1" id="cant' +
                            x
                            .idpiso +
                            '" class="form-control form-control-sm " style="width:70px" /> <button class="btn btn-sm btn-primary" onclick="Calcular(' +
                            x.idpiso + ',' + parseFloat((x.montototal == null ? "0" : x.montototal)) +
                            ')">Cal</button>  <input type="number" id="resp' + x.idpiso +
                            '" class="form-control form-control-sm" style="width:80px" disabled /></td><tr>';


                        $('#detalleconsumo').append(html);
                    });

                } else {
                    $('#txtTotalConsumo').val('00.00 Kwh');
                    $('#txtPrecioxKW').val('S/ 00.00');
                    $('#txtCargosFijos').val('S/ 00.00');
                    $('#txtCargosFraccionamiento').val('S/ 00.00');
                    $('#txtIGV').val('00.00 %');
                    $('#txtTotalConsumomes').val('S/ 00.00');
                    $('#imgrecibo').prop('src', noImg);
                    $('#imgreciboTemp').prop('href', noImg);
                    $('#txtComentarios').val();
                    $('#detalleconsumo').html('');
                }
            });
        };
    @endsection
</script>
