<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>WebTools Site</title>

    <link href="{!! asset('../resources/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('../resources/font-awesome/css/font-awesome.css') !!}" rel="stylesheet">

    <link href="{!! asset('../resources/css/plugins/blueimp/css/blueimp-gallery.min.css') !!}" rel="stylesheet">
    <!-- Toastr style -->
    <link href="{!! asset('../resources/css/plugins/toastr/toastr.min.css') !!}" rel="stylesheet">

    <link href="{!! asset('../resources/css/animate.css') !!}" rel="stylesheet">
    <link href="{!! asset('../resources/css/style.css') !!}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{!! asset('../resources/js/plugins/gritter/jquery.gritter.css') !!}" rel="stylesheet">

    <link href="{!! asset('../resources/css/plugins/iCheck/custom.css') !!}" rel="stylesheet">
    <link href="{!! asset('../resources/css/plugins/steps/jquery.steps.css') !!}" rel="stylesheet">
    <link href="{!! asset('../resources/css/plugins/sweetalert/sweetalert.css') !!}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.min.css" rel="stylesheet"> --}}


</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle" src="{!! asset('../resources/img/profile_small.jpg') !!}" />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">Erick Leyva</span>
                                <span class="text-muted text-xs block">Analista Programador<b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Perfil</a></li>
                                <li><a class="dropdown-item" href="{{ url('/contactos/') }}">Contactos</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="mailbox.html">Credenciales</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            EL+
                        </div>
                    </li>
                    <li>
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i><span
                                class="nav-label">Principal</span></a>
                    </li>

                    <li>
                        <a href="{{ url('/dispositivos/') }}"><i class="fa fa-flask"></i> <span
                                class="nav-label">Dispositivos</span></a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-code" aria-hidden="true"></i> <span class="nav-label">Utiles
                                Dev</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="search_results.html">Formatear Json</a></li>
                            <li><a href="lockscreen.html">Base64</a></li>
                            <li><a href="login.html">Herramientas de texto</a></li>
                            <li><a href="register.html">Visualizar Html</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-paper-plane-o" aria-hidden="true"></i><span
                                class="nav-label">Memorias</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{ route('memorias.videos') }}">
                                    {{-- <i class="fa fa-forward" aria-hidden="true"></i> --}}
                                    <span class="nav-label">Videos</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('memorias.imagenes') }}">
                                    {{-- <i class="fa fa-picture-o"></i>  --}}
                                    <span class="nav-label">Imágenes</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('memorias.frases') }}">
                                    {{-- <i class="fa fa-font" aria-hidden="true"></i> --}}
                                    <span class="nav-label">Frases</span></a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{ request()->routeIs('servicios.*') ? 'active' : '' }}">
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Servicios</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="{{ request()->routeIs('servicios.resumen') ? 'active' : '' }}"><a
                                    href="{{ route('servicios.resumen') }}">Resumen</a></li>
                            <li class="{{ request()->routeIs('servicios.luz') ? 'active' : '' }}"><a
                                    href="{{ route('servicios.luz') }}">Luz</a></li>
                            <li class="{{ request()->routeIs('servicios.agua') ? 'active' : '' }}"><a
                                    href="{{ route('servicios.agua') }}">Agua</a></li>
                            <li class="{{ request()->routeIs('servicios.internet') ? 'active' : '' }}"><a
                                    href="{{ route('servicios.internet') }}">Internet</a></li>
                            <li class="{{ request()->routeIs('servicios.gas') ? 'active' : '' }}"><a
                                    href="{{ route('servicios.gas') }}">Gas</a></li>
                            <li class="{{ request()->routeIs('servicios.otros') ? 'active' : '' }}"><a
                                    href="{{ route('servicios.otros') }}">Otros</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-money" aria-hidden="true"></i><span
                                class="nav-label">Gastos</span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li style="padding: 20px">
                            <span class="m-r-sm text-muted welcome-message">Userley Soft.</span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages dropdown-menu-right">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle"
                                                src="{!! asset('../resources//img/a7.jpg') !!}">
                                        </a>
                                        <div class="media-body">
                                            <small class="float-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica
                                                Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle"
                                                src="{!! asset('../resources//img/a4.jpg') !!}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica
                                                Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle"
                                                src="{!! asset('../resources//img/profil') !!}e.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html" class="dropdown-item">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="profile.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="float-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="grid_options.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html" class="dropdown-item">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="login.html">
                                <i class="fa fa-sign-out"></i>Salir
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="row wrapper border-bottom white-bg page-heading">
                @yield('header')
            </div>
            <div class="wrapper wrapper-content ">
                @yield('content')
            </div>
            <div class="footer">
                <div class="float-right">
                    <strong>Copyright</strong> U-Soft &copy; 2022-2023
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{!! asset('../resources/js/jquery-3.1.1.min.js') !!}"></script>
    <script src="{!! asset('../resources/js/popper.min.js') !!}"></script>
    <script src="{!! asset('../resources/js/bootstrap.js') !!}"></script>
    <script src="{!! asset('../resources/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('../resources/js/plugins/metisMenu/jquery.metisMenu.js') !!}"></script>
    <script src="{!! asset('../resources/js/plugins/slimscroll/jquery.slimscroll.min.js') !!}"></script>

    <!-- blueimp gallery -->
    <script src="{!! asset('../resources/js/plugins/blueimp/jquery.blueimp-gallery.min.js') !!}"></script>

    <!-- Flot -->
    <script src="{!! asset('../resources/js/plugins/flot/jquery.flot.js') !!}"></script>
    <script src="{!! asset('../resources/js/plugins/flot/jquery.flot.tooltip.min.js') !!}"></script>
    <script src="{!! asset('../resources/js/plugins/flot/jquery.flot.spline.js') !!}"></script>
    <script src="{!! asset('../resources/js/plugins/flot/jquery.flot.resize.js') !!}"></script>
    <script src="{!! asset('../resources/js/plugins/flot/jquery.flot.pie.js') !!}"></script>

    <!-- Peity -->
    <script src="{!! asset('../resources/js/plugins/peity/jquery.peity.min.js') !!}"></script>
    <script src="{!! asset('../resources/js/demo/peity-demo.js') !!}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{!! asset('../resources/js/inspinia.js') !!}"></script>
    <script src="{!! asset('../resources/js/plugins/pace/pace.min.js') !!}"></script>

    <!-- Steps -->
    <script src="{!! asset('../resources/js/plugins/steps/jquery.steps.min.js') !!}"></script>

    <!-- Jquery Validate -->
    <script src="{!! asset('../resources/js/plugins/validate/jquery.validate.min.js') !!}"></script>

    <!-- jQuery UI -->
    <script src="{!! asset('../resources/js/plugins/jquery-ui/jquery-ui.min.js') !!}"></script>

    <!-- GITTER -->
    <script src="{!! asset('../resources/js/plugins/gritter/jquery.gritter.min.js') !!}"></script>

    <!-- Sparkline -->
    <script src="{!! asset('../resources/js/plugins/sparkline/jquery.sparkline.min.js') !!}"></script>

    <!-- Sparkline demo data  -->
    <script src="{!! asset('../resources/js/demo/sparkline-demo.js') !!}"></script>

    <!-- ChartJS-->
    <script src="{!! asset('../resources/js/plugins/chartJs/Chart.min.js') !!}"></script>

    <!-- Toastr -->
    <script src="{!! asset('../resources/js/plugins/toastr/toastr.min.js') !!}"></script>

    <script src="{!! asset('../resources/js/plugins/sweetalert/sweetalert.min.js') !!}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.2/dist/sweetalert2.all.min.js"></script> --}}

    <script>
        $(document).ready(function() {
            @yield('ready')
            $(".loader").fadeOut("slow");
        });

        var base64URL = "";
        var base64URLx = "";

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

        const comprimirImagen = (imagenComoArchivo, porcentajeCalidad) => {

            return new Promise((resolve, reject) => {
                const $canvas = document.createElement("canvas");
                const imagen = new Image();
                imagen.onload = () => {
                    $canvas.width = imagen.width;
                    $canvas.height = imagen.height;
                    $canvas.getContext("2d").drawImage(imagen, 0, 0);
                    $canvas.toBlob(
                        (blob) => {
                            if (blob === null) {
                                return reject(blob);
                            } else {
                                resolve(blob);
                            }
                        },
                        "image/jpeg",
                        porcentajeCalidad / 100
                    );
                };
                imagen.src = URL.createObjectURL(imagenComoArchivo);
            });
        };
        
        @yield('functions')
    </script>
</body>

</html>
