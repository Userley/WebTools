@extends('layouts.plantilla')

@section('title', 'Resumen Servicios')

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
                <a href="index.html">Resumen</a>
            </li>
        </ol>
    </div>
@endsection

@section('content')
    @csrf
    <div class="d-flex align-content-center">
        <a href=""> <button class="btn btn-primary col-md-12"><i class="fa fa-file-o" aria-hidden="true"></i>
                Filtrar</button></a>
    </div>
    <hr>

    <div class="ibox float-e-margins animated fadeInRight">
        <div class="ibox-title">
            <h5>Historico Consumo Luz</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div>
                <div class="row justify-content-between">
                    <div class="col-md-12 p-3">
                        <div class="form-group d-inline-flex">
                            <select class="form-control w-100 mx-4" aria-label="" id="cboanio">
                                {{-- <option selected>Seleccione año</option> --}}

                                @foreach ($AniosLuz as $anio)
                                    <option value="{{ $anio->anio }}">{{ $anio->anio }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success" onclick="ConsultarLuz()">Filtrar</button>
                        </div>
                    </div>
                    <div class="col-md-6 p-3">
                        <label for="barLuz"><strong>Costo Kmh x Mes</strong></label>
                        <canvas id="barLuz" height="130" class="animated fadeInRight"></canvas>
                    </div>
                    <div class="col-md-6 p-3">
                        <label for="lineLuz"><strong>Costo Kmh x Mes</strong></label>
                        <canvas id="lineLuz" height="130" class="animated fadeInRight"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ibox float-e-margins animated fadeInRight">
        <div class="ibox-title">
            <h5>Historico Consumo Agua</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="ibox float-e-margins animated fadeInRight">
                            <div class="ibox-title">
                                <h5>Monto Mensual x Piso</h5>
                            </div>
                            <div class="ibox-content">
                                <div>
                                    <canvas id="lineAgua" height="140"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ibox float-e-margins animated fadeInRight">
                            <div class="ibox-title">
                                <h5>Costo Kmh x Mes</h5>
                            </div>
                            <div class="ibox-content">
                                <div>
                                    <canvas id="barAgua" height="140"></canvas>
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
            <h5>Historico Consumo Internet</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <select name="cboanio" id="cboanio"></select>
                            <button class="btn btn-success">Filtrar</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ibox float-e-margins animated fadeInRight">
                            <div class="ibox-title">
                                <h5>Monto Mensual x Piso</h5>
                            </div>
                            <div class="ibox-content">
                                <div>
                                    <canvas id="lineInternet" height="140"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="ibox float-e-margins animated fadeInRight">
                            <div class="ibox-title">
                                <h5>Costo Kmh x Mes</h5>
                            </div>
                            <div class="ibox-content">
                                <div>
                                    <canvas id="barInternet" height="140"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection


<script>
    @section('ready')
        var textarea = document.createElement("textarea");
        textarea.innerHTML = '{{ $jsondetalle }}';
        let Resp = JSON.parse(textarea.value);

        var barData = {
            labels: Resp.meses,
            datasets: Resp.data.sort()
        };

        var barOptions = {
            responsive: true
        };


        var ctx2 = document.getElementById("barLuz").getContext("2d");
        window.grafica = new Chart(ctx2, {
            type: 'bar',
            data: barData,
            options: barOptions
        });

        CargarGraficoLuz2(null, null);
        // var lineData = {
        //     labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov", "Dic"],
        //     datasets: [{
        //         label: "Data 1",
        //         backgroundColor: 'rgba(220, 220, 220, 0.5)',
        //         pointBorderColor: "#fff",
        //         data: [00, 00, 00, 00, 00, 00, 00]
        //     }]
        // };

        // var lineOptions = {
        //     responsive: true
        // };


        // var ctx = document.getElementById("lineLuz").getContext("2d");
        // new Chart(ctx, {
        //     type: 'line',
        //     data: lineData,
        //     options: lineOptions
        // });
    @endsection


    @section('functions')


        const CargarGraficoLuz2 = (linedata, labels) => {
            var lineDatax = linedata
            if (linedata == null || linedata == undefined) {
                var lineDatax = {
                    labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Set", "Oct", "Nov",
                        "Dic"
                    ],
                    datasets: [{
                        label: "Costo x kmh",
                        backgroundColor: 'rgba(220, 220, 220, 0.5)',
                        pointBorderColor: "#fff",
                        data: [00, 00, 00, 00, 00, 00, 00]
                    }]
                };
            } else {
                var lineDatax = {
                    labels: labels,
                    datasets: linedata
                };
            }

            var lineOptions = {
                responsive: true
            };

            if (window.graficalineal) {
                window.graficalineal.clear();
                window.graficalineal.destroy();
            }

            var ctx = document.getElementById("lineLuz").getContext("2d");
            window.graficalineal = new Chart(ctx, {
                type: 'line',
                data: lineDatax,
                options: lineOptions
            });
        }


        const ConsultarLuz = () => {
            $.ajax({
                url: "{{ route('servicios.filtrarresluz') }}",
                method: 'GET',
                data: {
                    _token: $("input[name='_token']").val(),
                    anio: $('#cboanio').val()
                }
            }).done(function(data) {
                console.log(data);
                CargarGraficoLuz2(data.data, data.meses);
            });
        }
    @endsection
</script>
