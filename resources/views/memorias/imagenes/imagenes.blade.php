@extends('layouts.plantilla')

@section('title', 'Imágenes')

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
        </ol>
    </div>
@endsection

@section('content')
    @csrf
    <div class="d-flex align-content-center">
        <a href="{{ url('/memorias/imagenes/crear/') }}"> <button class="btn btn-primary col-md-12"><i class="fa fa-file-o"
                    aria-hidden="true"></i> Nuevo registro</button></a>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-filter" aria-hidden="true"></i>
                        Categorias</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-12">
                            <div style="overflow-y: scroll; height:330px">
                                <ul class="list-group" id="listaCategorias">
                                    <li class="list-group-item list-group-item-action active" id="Cat-0"
                                        onclick="filtrar(event);">
                                        Todos
                                    </li>
                                    @foreach ($Categorias as $categoria)
                                        <li class="list-group-item list-group-item-action"
                                            id="Cat-{{ $categoria->idcategoria }}" onclick="filtrar(event);">
                                            {{ $categoria->descripcion }}
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
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div>
                        <h2>Galerías de imágenes</h2>
                    </div>
                    <hr>
                    <div class="lightBoxGallery" id="lstfotos">

                        <div class="d-flex justify-content-end">
                            {!! $Imagenes->links('pagination::bootstrap-5') !!}
                        </div>
                        @foreach ($Imagenes as $imagen)
                            <a href="{{ $imagen->imagen }}" title="{{ $imagen->idimagenes }}.{{ $imagen->titulo }}"
                                data-gallery="">
                                <img src="{{ $imagen->imagen }}" style="width: 100px;height: 100px;object-fit: cover;"
                                    id="{{ $imagen->idimagenes }}" /></a>
                        @endforeach

                        {{-- {!! $Imagenes->render() !!} --}}

                    </div>
                    <div id="blueimp-gallery" class="blueimp-gallery">
                        <div class="slides"></div>
                        <h3 class="title"></h3>
                        <a class="prev">‹</a>
                        <a class="next">›</a>
                        <a class="close">×</a>
                        <a class="play-pause"></a>
                        <a class="btn btn-danger delete-confirm-ajax close" onclick="removeimagen();" data-ajax="true"
                            data-id="" href=" "><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <ol class="indicator"></ol>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection

<script>
    @section('ready')
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            $('#lstfotos').html('<div class="loader"></div>');
            let id = document.getElementById('listaCategorias').querySelectorAll('li.active')[0].id.split('-')[
                1];
            $.ajax({
                url: "{{ route('memorias.imagenes') }}",
                data: {
                    page: $(this).attr('href').split('page=')[1],
                    idcategoria: id
                },
                type: 'Get',
                datatype: 'json',
                success: function(data) {
                    $('#lstfotos').html(data);
                }
            });

        });
    @endsection


    @section('functions')

        const removeimagen = () => {

            let codigo = $('.title')[0].innerText.split('.')[0];

            swal({
                title: "¿Estas seguro?",
                text: "No podrás recuperar este archivo!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Sí, Eliminar!",
                closeOnConfirm: true
            }, function() {
                $.ajax({
                    url: "{{ route('memorias.removeimagen') }}",
                    data: {
                        '_token': $("input[name='_token']").val(),
                        'id': codigo
                    },
                    type: 'post',
                    success: function(data) {

                        if (data > 0) {
                            var idcategoria = $('#listaCategorias li.active')[0].id;
                            let idCat = (idcategoria.split('-')[1]);
                            let page = '1';

                            $.ajax({
                                url: "{{ route('memorias.imagenes') }}",
                                data: {
                                    page: page,
                                    idcategoria: idCat
                                },
                                type: 'Get',
                                datatype: 'json',
                                success: function(data) {

                                    $('#lstfotos').html(data);
                                    setTimeout(function() {
                                        toastr.options = {
                                            closeButton: true,
                                            // progressBar: true,
                                            showMethod: 'slideDown',
                                            timeOut: 3000
                                        };
                                        toastr.success(
                                            '¡La imágen fue eliminada!',
                                            'Eliminación');

                                    }, 500);
                                }
                            });
                        }
                    }
                });
            });
        }

        const filtrar = (e) => {
            var idcategoria = e.target.id;
            $('#lstfotos').html('<div class="loader"></div>');
            document.getElementById('listaCategorias').querySelectorAll('li').forEach(x => {
                $('#' + x.id).removeClass('active');
            })

            $('#' + idcategoria).addClass('active');
            let idCat = (idcategoria.split('-')[1]);
            let page = '1';

            $.ajax({
                url: "{{ route('memorias.imagenes') }}",
                data: {
                    page: page,
                    idcategoria: idCat
                },
                type: 'Get',
                datatype: 'json',
                success: function(data) {
                    if (idCat == '9') {
                        swal({
                                title: "Password",
                                text: "Ingrese Password:",
                                type: "input",
                                showCancelButton: true,
                                closeOnConfirm: true,
                                animation: "slide-from-top",
                            },
                            function(inputValue) {
                                console.log({
                                    inputValue
                                });
                                if (inputValue === false) {
                                    $('#Cat-0').addClass('active');
                                    $('#Cat-9').removeClass('active');
                                    $('#lstfotos').html(data);
                                    return;
                                }

                                $.ajax({
                                    url: "{{ route('memorias.imagenes') }}",
                                    data: {
                                        page: '1',
                                        idcategoria: idCat,
                                        pass: inputValue
                                    },
                                    type: 'Get',
                                    datatype: 'json',
                                    success: function(data2) {
                                        $('#lstfotos').html(data2);

                                    }
                                });
                            });
                    } else {
                        $('#lstfotos').html(data);
                    }
                }
            });

        }
    @endsection
</script>
