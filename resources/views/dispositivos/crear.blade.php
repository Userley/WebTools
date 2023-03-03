@extends('layouts.plantilla')

@section('title', 'Crear')

@section('header')
    <div class="col-lg-10">
        <h2>Dispositivos</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Dispositivos</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Nuevo</a>
            </li>
        </ol>
    </div>
@endsection

@section('content')
    <form action="{{ route('dispositivo.save') }}" method="post">
        @csrf
        <div class="ibox float-e-margins animated fadeInRight">
            <div class="ibox-title">
                <h5>Nuevo Dispositivo</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="Nombre" class="col-sm-5 control-label">Nombre:</label>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="Nombre">
                                @error('Nombre')
                                    <small class="text-danger">*{{ $message }}</small>
                                    <br>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Descripcion" class="col-sm-2 control-label">Descripción</label>
                            <div class="col-md-12">
                                <textarea class="form-control" name="Descripcion" rows="4"></textarea>
                                @error('Descripcion')
                                    <small class="text-danger">*{{ $message }}</small>
                                    <br>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="formFile" class="col-sm-2 control-label">Imágen</label>
                            <div class="col-md-12">
                                <input class="form-control" type="file" id="formFile" accept="image/*">
                            </div>
                        </div>
                        <div class="col-md-12 text-center item">
                            <img id="imagenPrevisualizacion" width="150" style="border-radius:50%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-group">
            <input type="submit" value="Registrar" class="btn btn-success">
            <button type="reset" class="btn btn-danger">Limpiar</button>
            <a href="{{ url('/dispositivos/') }}"> <input type="button" value="Regresar" class="btn btn-secondary"></a>
        </div>
    </form>


    <script>
        // Obtener referencia al input y a la imagen

        const $seleccionArchivos = document.querySelector("#formFile"),
            $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

        // Escuchar cuando cambie
        $seleccionArchivos.addEventListener("change", () => {
            // Los archivos seleccionados, pueden ser muchos o uno
            const archivos = $seleccionArchivos.files;
            // Si no hay archivos salimos de la función y quitamos la imagen
            if (!archivos || !archivos.length) {
                $imagenPrevisualizacion.src = "";
                return;
            }
            // Ahora tomamos el primer archivo, el cual vamos a previsualizar
            const primerArchivo = archivos[0];
            // Lo convertimos a un objeto de tipo objectURL
            const objectURL = URL.createObjectURL(primerArchivo);
            // Y a la fuente de la imagen le ponemos el objectURL
            $imagenPrevisualizacion.src = objectURL;
        });
    </script>
@endsection
