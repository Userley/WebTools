<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>WebTools Site</title>

    {{-- <link href=" ../resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="../resources/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="../resources/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="../resources/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="../resources/css/animate.css" rel="stylesheet">
    <link href="../resources/css/style.css" rel="stylesheet"> --}}

    <link href="{!! asset('../resources/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('../resources/font-awesome/css/font-awesome.css') !!}" rel="stylesheet">

    <link href="{!! asset('../resources/css/plugins/blueimp/css/blueimp-gallery.min.css') !!}" rel="stylesheet">
    <!-- Toastr style -->
    <link href="{!! asset('../resources/css/plugins/toastr/toastr.min.css') !!}" rel="stylesheet">
    
    <!-- Gritter -->
    <link href="{!! asset('../resources/js/plugins/gritter/jquery.gritter.css') !!}" rel="stylesheet">
    
    <link href="{!! asset('../resources/css/animate.css') !!}" rel="stylesheet">
    <link href="{!! asset('../resources/css/style.css') !!}" rel="stylesheet">
    
    <link href="{!! asset('../resources/css/plugins/iCheck/custom.css') !!}" rel="stylesheet">
    <link href="{!! asset('../resources/css/plugins/steps/jquery.steps.css') !!}" rel="stylesheet">
    



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
                        {{-- <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Videos</span><span
                                class="fa arrow"></span></a> --}}
                        <a href="#"><i class="fa fa-forward" aria-hidden="true"></i><span
                                class="nav-label">Videos</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="typography.html"><i class="fa fa-youtube-play" aria-hidden="true"></i>
                                    Youtube</a></li>
                            <li><a href="icons.html"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
                            </li>
                            <li><a href="draggable_panels.html"><i class="fa fa-twitter" aria-hidden="true"></i>
                                    Twitter</a></li>
                            <li><a href="resizeable_panels.html"><i class="fa fa-music" aria-hidden="true"></i> Tik
                                    Tok</a></li>
                            <li><a href="buttons.html"><i class="fa fa-film" aria-hidden="true"></i> Otros</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-picture-o"></i> <span class="nav-label">Imágenes</span><span
                                class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">
                            <li><a href="table_basic.html">Inspiradoras</a></li>
                            <li><a href="table_data_tables.html">Científicas</a></li>
                            <li><a href="table_foo_table.html">Desarrollo</a></li>
                            <li><a href="jq_grid.html">Personales</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-font" aria-hidden="true"></i><span
                                class="nav-label">Textos</span></a>
                    </li>
                    <li>
                        <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span
                                class="nav-label">Métricas</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="slick_carousel.html">Frecuencia Dispositivos</a></li>
                            <li><a href="basic_gallery.html">Consumo servicios</a></li>
                            <li><a href="carousel.html">Frecuencia Web</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="metrics.html"><i class="fa fa-clock-o" aria-hidden="true"></i><span
                                class="nav-label">Histórico</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="">Dispositivos</a></li>
                            <li><a href="slick_carousel.html">Servicios</a></li>
                            <li><a href="carousel.html">Videos</a></li>
                            <li><a href="carousel.html">Imágenes</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Servicios</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ url('/servicios/luz/') }}">Luz</a></li>
                            <li><a href="{{ url('/servicios/agua/') }}">Agua</a></li>
                            <li><a href="{{ url('/servicios/internet/') }}">Internet</a></li>
                            <li><a href="form_file_upload.html">Otros</a></li>
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
                                            <img alt="image" class="rounded-circle" src="../resources/img/a7.jpg">
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
                                            <img alt="image" class="rounded-circle" src="../resources/img/a4.jpg">
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
                                                src="../resources/img/profile.jpg">
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
    
    
    
    
    <script>
        $(document).ready(function() {
            // setTimeout(function() {
                //     toastr.options = {
            //         closeButton: true,
            //         progressBar: true,
            //         showMethod: 'slideDown',
            //         timeOut: 4000
            //     };
            //     toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');

            // }, 1300);


            var data1 = [
                [0, 4],
                [1, 8],
                [2, 5],
                [3, 10],
                [4, 4],
                [5, 16],
                [6, 5],
                [7, 11],
                [8, 6],
                [9, 11],
                [10, 30],
                [11, 10],
                [12, 13],
                [13, 4],
                [14, 3],
                [15, 3],
                [16, 6]
            ];
            var data2 = [
                [0, 1],
                [1, 0],
                [2, 2],
                [3, 0],
                [4, 1],
                [5, 3],
                [6, 1],
                [7, 5],
                [8, 2],
                [9, 3],
                [10, 2],
                [11, 1],
                [12, 0],
                [13, 2],
                [14, 8],
                [15, 0],
                [16, 0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ], {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#d5d5d5",
                    borderWidth: 1,
                    color: '#d5d5d5'
                },
                colors: ["#1ab394", "#1C84C6"],
                xaxis: {},
                yaxis: {
                    ticks: 4
                },
                tooltip: false
            });

            var doughnutData = {
                labels: ["App", "Software", "Laptop"],
                datasets: [{
                    data: [300, 50, 100],
                    backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"]
                }]
            };


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, {
                type: 'doughnut',
                data: doughnutData,
                options: doughnutOptions
            });

            var doughnutData = {
                labels: ["App", "Software", "Laptop"],
                datasets: [{
                    data: [70, 27, 85],
                    backgroundColor: ["#a3e1d4", "#dedede", "#9CC3DA"]
                }]
            };


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
            new Chart(ctx4, {
                type: 'doughnut',
                data: doughnutData,
                options: doughnutOptions
            });

        });
    </script>





    <script>
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
        $(document).ready(function() {



            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function(event, currentIndex, newIndex) {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex) {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18) {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex) {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function(event, currentIndex, priorIndex) {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3) {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function(event, currentIndex) {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function(event, currentIndex) {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                errorPlacement: function(error, element) {
                    element.before(error);
                },
                rules: {
                    confirm: {
                        equalTo: "#password"
                    }
                }
            });
        });
    </script>
</body>

</html>
