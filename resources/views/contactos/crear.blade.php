@extends('layouts.plantilla')

@section('title', 'Home')

@section('header')
    <div class="col-lg-10">
        <h2>Contactos</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Contactos</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Crear</a>
            </li>
        </ol>
    </div>
@endsection

    {{-- {{
    if ($estado) {
        echo "<javascript>Swal.fire(
      'Good job!',
      'You clicked the button!',
      'success'
    )</javascript>";
    }
}} --}}
@section('content')


    <form action="{{ route('contactos.save') }}" method="post">
        @csrf
        <div class="ibox float-e-margins animated fadeInRight">
            <div class="ibox-title">
                <h5><i class="fa fa-user" aria-hidden="true"></i> Datos Personales</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-9">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txtNombres">Nombres:</label>
                                    <input type="text" class="form-control" name="nombres" required>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="txtApellidos">Apellidos:</label>
                                    <input type="text" class="form-control" name="apellidos" required>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group ">
                                    <label class="control-label" for="txtDireccion">Dirección:</label>
                                    <input type="text" class="form-control" name="direccion" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="txtCiudad">Ciudad:</label>
                                    <input type="text" class="form-control" name="ciudad" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="txtCorreo">Correo:</label>
                                    <input type="text" class="form-control" name="correo" required>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="txtTelefono">Teléfono:</label>
                                    <input type="text" class="form-control" name="telefono" required>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label" for="txtCelular">Celular:</label>
                                    <input type="text" class="form-control" name="celular" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="formFile" for="formFile" class="control-label">Avatar:</label>
                            <input class="form-control" type="file" id="formFile" name="avatar">
                        </div>
                        <div class="form-group">
                            <div class="text-center item">
                                <img id="imagenPrevisualizacion" width="130" style="border-radius:50%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 hr-line-dashed"></div>

        <div class="ibox float-e-margins animated fadeInRight">
            <div class="ibox-title">
                <h5><i class="fa fa-globe" aria-hidden="true"></i> Redes Sociales</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="txtFacebook">Facebook:</label>
                            <input type="text" class="form-control" name="facebook">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="txtTwitter">Twitter:</label>
                            <input type="text" class="form-control" name="twitter">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="txtInstagram">Instagram:</label>
                            <input type="text" class="form-control" name="instagram">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="txtTikTok">TikTok:</label>
                            <input type="text" class="form-control" name="tiktok">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="txtWebSite">WebSite:</label>
                            <input type="text" class="form-control" name="txtWebSite">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label" for="txtOtros">Otros:</label>
                            <input type="text" class="form-control" name="otros">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 hr-line-dashed"></div>

        <div class="ibox float-e-margins animated fadeInRight">
            <div class="ibox-title">
                <h5><i class="fa fa-industry" aria-hidden="true"></i> Datos Laborales</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txtCargo">Cargo:</label>
                            <input type="email" class="form-control" name="cargo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="txtOrganizacion">Organización:</label>
                            <input type="text" class="form-control" name="organizacion">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn-group">
            <input type="submit" value="Registrar" class="btn btn-success">
            <button type="reset" class="btn btn-danger">Limpiar</button>
            <a href="{{ url('/contactos/') }}"> <input type="button" value="Regresar" class="btn btn-secondary"></a>
        </div>
    </form>
    <br>
    <br>
    <script>
        const $seleccionArchivos = document.querySelector("#formFile"),
            $imagenPrevisualizacion = document.querySelector("#imagenPrevisualizacion");

        $seleccionArchivos.addEventListener("change", () => {
            const archivos = $seleccionArchivos.files;

            if (!archivos || !archivos.length) {
                $imagenPrevisualizacion.src = "";
                return;
            }

            const primerArchivo = archivos[0];
            const objectURL = URL.createObjectURL(primerArchivo);
            $imagenPrevisualizacion.src = objectURL;
        });
    </script>
@endsection
