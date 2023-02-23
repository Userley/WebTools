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
            <div class="ibox float-e-margins animated fadeInRight">
                <div class="ibox-title">
                    <h5><i class="fa fa-filter" aria-hidden="true"></i>
                        Filtros</h5>
                </div>

                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="idmes">Mes:</label>
                                <select class="form-select form-control" id="cbomes" name="idmes">
                                    @foreach ($Meses as $Mes)
                                        <option value="{{ $Mes->idmes }}">{{ $Mes->descripcion }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="idanio">Año:</label>
                                <select class="form-select form-control" id="cboanio" name="idanio">
                                    @foreach ($Anios as $Anio)
                                        <option value="{{ $Anio->idanio }}">{{ $Anio->descripcion }}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>
                        <div class="col-md-12  col-sm-12 align-self-center">
                            <button class="btn btn-primary btn-lg w-100 mt-3" onclick="filtrar()">
                                <i class="fa fa-terminal" aria-hidden="true"></i> Buscar</button>
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
                                        <label class="control-label" for="txtTotalConsumo">Total Consumo Kw:</label>
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
                                        <label class="control-label" for="txtCargosFraccionamiento">Cargos
                                            Fraccionamiento:</label>
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
                                        <label class="control-label" for="txtTotalConsumomes">Total Consumo del
                                            mes.:</label>
                                        <input type="text" class="form-control text-danger fw-bolder"
                                            id="txtTotalConsumomes" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 ">
                            <div class="form-group text-center">
                                <h5>Imágen Recibo</h5>
                                <div id="links">
                                    <a id="imgreciboTemp" href="{!! asset('../resources/img/Noimage.png') !!}" title="recibo">
                                        <img id="imgrecibo" src="{!! asset('../resources/img/Noimage.png') !!}" width="85"
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


    <div class="row" id="detalleconsumo">

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
    function filtrar() {
        $.ajax({
            url: "{{ route('servicios.filtrar') }}",
            method: 'Get',
            data: {
                '_token': $("input[name='_token']").val(),
                'idmes': $("#cbomes").val(),
                'idanio': $("#cboanio").val(),
            }
        }).done(function(data) {
            var datos = JSON.parse(data);
            var noImg = "{{ asset('../resources/img/Noimage.png') }}";
            if (datos != undefined) {

                if (datos.Cabecera[0].image == null) {
                    datos.Cabecera[0].image = noImg;
                }

                $('#txtTotalConsumo').val(datos.Cabecera[0].consumokwtotal + " Kwh");
                $('#txtPrecioxKW').val("S/ " + parseFloat(datos.Cabecera[0].precioxkw));
                $('#txtCargosFijos').val("S/ " + parseFloat(datos.Cabecera[0].costoadministrativo));
                $('#txtCargosFraccionamiento').val("S/ " + parseFloat(datos.Cabecera[0].costofraccionamiento));
                $('#txtIGV').val(parseInt(datos.Cabecera[0].igv) + " %");
                $('#txtTotalConsumomes').val("S/ " + parseFloat(datos.Cabecera[0].costototalconsumo));
                $('#imgrecibo').prop('src', datos.Cabecera[0].image);
                $('#imgreciboTemp').prop('href', datos.Cabecera[0].image);

                $('#detalleconsumo').empty();

                datos.Detalle.sort(function(a, b) {
                    return a.idpiso - b.idpiso;
                });

                datos.Detalle.forEach(function(x) {
                    console.log(x.idpiso);
                    let html =
                        '<div class="col-md-6 col-sm-12"><div class="ibox float-e-margins animated fadeInRight"> <div class="ibox-title"> <h5><i class="fa fa-lightbulb-o" aria-hidden="true"></i> ' +
                        x.idpiso +
                        '</h5> <div class="ibox-tools"> <a class="collapse-link"> <i class="fa fa-chevron-up"></i> </a> </div> </div> <div class="ibox-content"> <div class="row"> <div class="col-md-3 col-sm-2"> <div class="form-group"> <label class="control-label">Medida al mes:</label> <input type="email" class="form-control" value="' +
                        (x.medidakw == null ? "0" : x.medidakw) +
                        ' Kwh" disabled> </div> </div> <div class="col-md-3 col-sm-2"> <div class="form-group"> <label class="control-label">Consumo Kw:</label> <input type="text" class="form-control" value="' +
                        (x.consumokw == null ? "0" : x.consumokw) +
                        '" disabled> </div> </div> <div class="col-md-3 col-sm-2"> <div class="form-group"> <label class="control-label">Costo Administ.:</label> <input type="text" class="form-control" value="' +
                        (x.montocostoadministrativo == null ? "0" : x.montocostoadministrativo) +
                        '" disabled> </div> </div> <div class="col-md-3 col-sm-2"> <div class="form-group"> <label class="control-label">Fraccionamiento:</label> <input type="text" class="form-control" value="' +
                        (x.montopagofraccionado == null ? "0" : x.montopagofraccionado) +
                        '" disabled> </div> </div> <div class="col-md-3 col-sm-2"> <div class="form-group"> <label class="control-label">Monto sin IGV:</label> <input type="text" class="form-control" value="' +
                        (x.montototalsinigv == null ? "0" : x.montototalsinigv) +
                        '" disabled> </div> </div> <div class="col-md-3 col-sm-2"> <div class="form-group"> <label class="control-label">Monto IGV:</label> <input type="text" class="form-control" value="' +
                        (x.montoigv == null ? "0" : x.montoigv) +
                        '" disabled> </div> </div> <div class="col-md-3 col-sm-2"> <div class="form-group"> <label class="control-label">Monto con IGV:</label> <input type="text" class="form-control" value="' +
                        (x.montototalconigv == null ? "0" : x.montototalconigv) +
                        '" disabled> </div> </div> <div class="col-md-3 col-sm-2"> <div class="form-group"> <label class="control-label">Monto Total:</label> <input type="text" class="form-control text-danger fw-bolder" value="' +
                        (x.montototal == null ? "0" : x.montototal) +
                        '" disabled> </div> </div> </div> </div> </div></div>';

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
                $('#detalleconsumo').html('');
            }

            console.log(datos);
        });
    };
</script>
