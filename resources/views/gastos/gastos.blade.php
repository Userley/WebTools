@extends('layouts.plantilla')

@section('title', 'Servicios')

@section('header')
    <div class="col-lg-10">
        <h2>Gastos</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                Gastos
            </li>
        </ol>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content">

                    <div class="form-group">
                        <label for="fecha">Seleccione Fecha:</label>
                        <input type="date" class="form-control w-50" name="fecha" id="fecha" class="date">
                    </div>
                    <div class="form-group">
                        <label for="concepto">Concepto:</label>
                        <input type="text" class="form-control" name="concepto" id="concepto" class="date"
                            onkeyup="saltarControl(event);">
                    </div>
                    <div class="form-group">
                        <label for="monto">Monto:</label>
                        <input type="number" class="form-control w-50" name="monto" id="monto" class="date"
                            onkeyup="saltarControl(event);">
                    </div>
                    <div class="form-group">
                        <label for="detalle">Detalle:</label>
                        <input type="text" class="form-control" name="detalle" id="detalle" class="date"
                            onkeyup="saltarControl(event);">
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-success" id="add" onkeyup="saltarControl(event);"
                            onclick="add();">Agregar</button>
                        <button class="btn btn-danger">Limpiar</button>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <h2>Detalle de Gastos</h2>
                    <small>Tienes <span id="totaldetalle"></span> registros.</small>
                    <ul class="list-group clear-list m-t">
                        <li class="list-group-item fist-item">
                            <span class="pull-right">
                                <input type="number" class="form-control form-control-sm float-right w-50" name=""
                                    id="" value="15" />
                            </span>
                            <span><button class="btn btn-sm btn-danger mt-1 mx-2"><i class="fa fa-trash-o"
                                        aria-hidden="true"></i></button></span> Please contact me
                        </li>
                    </ul>

                    {{-- <table class="footable table table-stripped toggle-arrow-tiny" style="font-size: 13px;">
                        <thead>
                            <tr>
                                <th data-toggle="true" style="width:60%">Concepto</th>
                                <th style="width:20%">Monto</th>
                                <th style="width:20%">Action</th>
                            </tr>
                        </thead>
                        <tbody id="lstgastos">
                        </tbody>
                    </table> --}}

                    {{-- 
                    <div style="overflow-y: scroll; height:330px">
                        <ul class="list-group" id="lstgastos">
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

@endsection


<script>
    @section('ready')
        window.onload = function() {
            var fecha = new Date(); //Fecha actual
            var mes = fecha.getMonth() + 1; //obteniendo mes
            var dia = fecha.getDate(); //obteniendo dia
            var ano = fecha.getFullYear(); //obteniendo año
            if (dia < 10)
                dia = '0' + dia; //agrega cero si el menor de 10
            if (mes < 10)
                mes = '0' + mes //agrega cero si el menor de 10
            $('#fecha').val(ano + "-" + mes + "-" + dia);
        }
    @endsection

    @section('functions')

        const saltarControl = (event) => {

            let id = event.target.id;
            if (event.which === 13) {

                if (id == "concepto") {
                    $('#monto').focus();
                } else if (id == "monto") {
                    $('#detalle').focus();
                } else if (id == "detalle") {
                    $('#add').focus();
                } else if (id == "add") {
                    $('#concepto').focus();
                }
            }
        }

        const add = () => {
            let concepto = $('#concepto').val();
            let monto = $('#monto').val();
            let detalle = $('#detalle').val();
            $('#lstgastos').append('<tr><td>' + concepto +
                '</td><td><input type="number" class="form-control" name="" id="" value="' + monto +
                '" /></td><td><button class="btn btn-danger mt-1 mx-2"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td></tr>'
            );

            // '<li class="list-group-item list-group-item-action m-0 p-0" id="" onclick=""> <div class="row"><div class="col-1"><button class="btn btn-danger mt-1 mx-2"><i class="fa fa-trash-o" aria-hidden="true"></i></button></div><div class="col-7 d-flex align-items-center">' +
            // concepto +
            // '</div><div class="col-3 text-center"><input type="number" class="form-control" name="" id="" value="' +
            // monto +
            // '" /></div></div></li>');
            $('#concepto').val('');
            $('#monto').val('');
            $('#detalle').val('');
        }
    @endsection
</script>
