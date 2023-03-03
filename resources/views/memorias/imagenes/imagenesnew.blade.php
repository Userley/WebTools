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
                <a href="index.html">Imágenes</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Crear</a>
            </li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="btn-group">
        <a href="{{ url('/memorias/imagenes/') }}"> <button class="btn btn-secondary">Regresar</button></a>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins animated fadeInRight">
                @csrf
                <div class="ibox-title">
                    <h5><i class="fa fa-file-image-o" aria-hidden="true"></i> Datos Imágen</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">

                        {{-- <div class="col-md-12">
                            <div class="form-group">
                                <label for="cbomes">Categorias:</label>
                                <select class="form-select form-control" id="cbomes" name="cbomes">
                                    @foreach ($Categorias as $Categoria)
                                        <option value="{{ $Categoria->idcategoria }}">{{ $Categoria->descripcion }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label" for="txtTitulo">Titulo:</label>
                                <input type="number" class="form-control" step="0.05" name="txtTitulo" id="txtTitulo"
                                    value="">
                            </div>
                        </div> --}}
                        <div class="col-md-12 align-self-center">

                            <div class="form-group">
                                <label for="formFile" class="control-label">Imagen:</label>
                                <input class="form-control" type="file" id="formFile" name="formFile"
                                    multiple="multiple" accept="image/*">
                            </div>

                        </div>
                        <div class="col-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="ibox float-e-margins animated fadeInRight">
                <div class="ibox-title">
                    <h5><i class="fa fa-picture-o" aria-hidden="true"></i> Visualizador</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mx-5">
                                <div class="text-center item">
                                    <img id="imagenPrevisualizacion" class="img-fluid rounded mx-auto d-block"
                                        width="350" style="border-radius:0%">
                                </div>
                            </div>
                        </div>
                    </div> --}}


                    <div style="overflow-y: scroll;overflow-x: hidden; height:330px">
                        <ul class="list-group" id="lstimages">
                            {{-- @foreach ($Categorias as $categoria)
                                <li class="list-group-item list-group-item-action" id="{{ $categoria->idcategoria }}"
                                    onclick="">
                                    <strong>{{ $categoria->descripcion }}</strong>
                                </li>
                            @endforeach --}}

                        </ul>
                    </div>
                    <div class="col-12">
                        <hr>
                        <div class="btn-group">
                            <button class="btn btn-success btn-lg w-50 " onclick="registrar();">Registrar</button>
                            <button class="btn btn-danger btn-lg w-50 " onclick="limpiar();">Limpiar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-2">
            <img src="' +
            base64URL +
            '" class="img-fluid rounded mx-auto d-block" width="80"
                style="border-radius:0%">
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-12">
                    <small><strong><label>Nombre: </label></strong></small>' +
                        images[index].name +
                        '
                </div>
                <div class="col-md-6">
                    <small><strong><label>Titulo: </label></strong><input type="text" class="form-control form-control-sm"
                            id="input' +
                        index + '" /></small>
                </div>
                <div class="col-md-6">
                    <small><strong><label>Categoría: </label></strong>' + Categorias(index) +
                        '</small>
                </div>
            </div>
        </div>

    </div> --}}
@endsection

<script>
    @section('functions')
        const inputFile = document.querySelector('#formFile');
        // const image = document.querySelector('#imagenPrevisualizacion');
        var base64URL = "";

        function round(value, decimals) {
            return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
        }

        async function encodeFileAsBase64URL(file) {
            return new Promise((resolve) => {
                // debugger;
                const reader = new FileReader();
                reader.addEventListener('loadend', () => {
                    resolve(reader.result);
                });
                reader.readAsDataURL(file);
            });
        };

        const Categorias = (id) => {
            return '<select class="form-select form-select-sm form-control form-control-sm" id="cbomes' + id +
                '" name="cbomes' +
                id +
                '">@foreach ($Categorias as $Categoria)<option value="{{ $Categoria->idcategoria }}"><small> {{ $Categoria->descripcion }}</small> </option>@endforeach</select>';
        }

        const limpiar = () => {
            document.getElementById("formFile").value = '';
            $('#lstimages').empty();
        }

        inputFile.addEventListener('input', async (event) => {
            let images = inputFile.files;
            let contenedor = document.getElementById('lstimages');

            for (let index = 0; index < images.length; index++) {
                // console.log(images[index].name);
                base64URL = await encodeFileAsBase64URL(inputFile.files[index]);
                contenedor.innerHTML +=
                    '<li class="list-group list-group-flush list-group-item-action p-1 m-0"><div class="row"> <div class="col-md-2 d-flex align-items-center"> <img src="' +
                    base64URL +
                    '" class="img-fluid rounded m-auto d-block" width="95" style="border-radius:0%"> </div> <div class="col-md-10"> <div class="row"> <div class="col-12"> <small><strong><label>Nombre: </label></strong></small>' +
                    images[index].name +
                    ' </div> <div class="col-md-6"> <small><strong><label>Titulo: </label></strong><input type="text" class="form-control form-control-sm" id="input' +
                    index +
                    '" /></small> </div> <div class="col-md-6"> <small><strong><label>Categoría: </label></strong>' +
                    Categorias(index) + '</small> </div> </div> </div></div></li>';
            }
            base64URL = await encodeFileAsBase64URL(inputFile.files[0]);
            // image.setAttribute('src', base64URL);
        });

        const registrar = () => {
            let lstImagenes = [];
            let cantRegistros = document.getElementById('lstimages').querySelectorAll('li').length;

            let imgs = document.getElementById('lstimages').querySelectorAll('li img');
            let nombres = document.getElementById('lstimages').querySelectorAll('li input');
            let categorias = document.getElementById('lstimages').querySelectorAll('li select');

            for (let index = 0; index < cantRegistros; index++) {
                var objimg = {
                    'img': imgs[index].src,
                    'nombre': nombres[index].value,
                    'categoria': categorias[index].value
                };
                lstImagenes.push(objimg);
            }

            // console.log(lstImagenes);
            $.ajax({
                url: "{{ route('memorias.saveimagenes') }}",
                method: 'POST',
                data: {
                    '_token': $("input[name='_token']").val(),
                    'data': lstImagenes,
                }
            }).done(function(data) {

                console.log(data);
                limpiar();
            });
        }
    @endsection
</script>
