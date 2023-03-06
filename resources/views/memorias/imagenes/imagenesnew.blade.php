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

        const eliminar = (id) => {
            console.log(id);
            document.getElementById("'" + id + "'").remove();
        }

        inputFile.addEventListener('input', async (event) => {
            let images = inputFile.files;
            let contenedor = document.getElementById('lstimages');

            if (images.length > 10) {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        // progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 3000
                    };
                    toastr.error('No se puede seleccionar mas de 10 imágenes',
                        'Registro de imágenes');

                }, 500);

                limpiar();
                return;
            } else {
                for (let index = 0; index < images.length; index++) {
                    let imgblob = await comprimirImagen(inputFile.files[index], 25);
                    let srcimg = URL.createObjectURL(imgblob);
                    base64URL = await encodeFileAsBase64URL(imgblob);
                    let iddelete = "'" + images[index].name + "'";

                    contenedor.innerHTML +=
                        '<li class="list-group list-group-flush p-1 m-0" id="' +
                        iddelete +
                        '" ><div class="row"> <div class="col-md-2 d-flex align-items-center"><div class="row"><div class="col-2  d-flex align-items-center"><span onclick="eliminar(' +
                        iddelete +
                        ');"><button class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i></button></span></div><div class="col-10  d-flex align-items-center"><img src="' +
                        base64URL +
                        '" class="img-fluid rounded m-auto d-block" width="95" style="border-radius:0%"></div></div>  </div> <div class="col-md-10"> <div class="row"> <div class="col-12"><small><strong><label>Nombre: </label></strong></small><p>' +
                        images[index].name +
                        ' </p></div> <div class="col-md-8"> <small><strong><label>Titulo: </label></strong><input type="text" class="form-control form-control-sm" id="input' +
                        index +
                        '" /></small> </div> <div class="col-md-4"> <small><strong><label>Categoría: </label></strong>' +
                        Categorias(index) + '</small> </div> </div> </div></div></li>';
                }
            }




        });

        const registrar = () => {
            let lstImagenes = [];
            let cantRegistros = document.getElementById('lstimages').querySelectorAll('li').length;


            if (cantRegistros > 0) {



                let imgs = document.getElementById('lstimages').querySelectorAll('li img');
                let nombres = document.getElementById('lstimages').querySelectorAll('li input');
                let categorias = document.getElementById('lstimages').querySelectorAll('li select');

                for (let index = 0; index < cantRegistros; index++) {
                    var objimg = {
                        'img': imgs[index].src,
                        'nombre': nombres[index].value.replace('','_'),
                        'categoria': categorias[index].value
                    };
                    lstImagenes.push(objimg);
                }

                $.ajax({
                    url: "{{ route('memorias.saveimagenes') }}",
                    method: 'POST',
                    data: {
                        '_token': $("input[name='_token']").val(),
                        'data': lstImagenes,
                    }
                }).done(function(data) {

                    if (data > 0) {

                        limpiar();
                        setTimeout(function() {
                            toastr.options = {
                                closeButton: true,
                                // progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 3000
                            };
                            toastr.success('¡Las imágenes se agregaron correctamente!',
                                'Registro de imágenes');

                        }, 500);
                    } else {
                        setTimeout(function() {
                            toastr.options = {
                                closeButton: true,
                                // progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 3000
                            };
                            toastr.error('No se pudo registrar las imágenes',
                                'Registro de imágenes');

                        }, 500);
                    }

                });
            }else{
                setTimeout(function() {
                            toastr.options = {
                                closeButton: true,
                                // progressBar: true,
                                showMethod: 'slideDown',
                                timeOut: 3000
                            };
                            toastr.error('No existen imágenes para guardar',
                                'Registro de imágenes');

                        }, 500);
            }
        }
    @endsection
</script>
