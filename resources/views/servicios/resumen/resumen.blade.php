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
                        <label for="barLuz"><strong>Consumo x Piso</strong></label>
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
        ConsultarLuz();
    @endsection


    @section('functions')

        const ConsultarLuz = () => {
            $.ajax({
                url: "{{ route('servicios.filtrarresluz') }}",
                method: 'GET',
                data: {
                    _token: $("input[name='_token']").val(),
                    anio: $('#cboanio').val()
                }
            }).done(function(data) {
                let JsonGraf1 = JSON.parse(data.Graf1);
                let JsonGraf2 = JSON.parse(data.Graf2);
                CargarGraficoLuz1(JsonGraf1.data, JsonGraf1.meses);
                CargarGraficoLuz2(JsonGraf2.data, JsonGraf2.meses);
            });
        }

        const CargarGraficoLuz1 = (bardata, labels) => {

            if (window.graficabar) {
                window.graficabar.clear();
                window.graficabar.destroy();
            }


            var barData = {
                labels: labels,
                datasets: bardata
            };

            var barOptions = {
                responsive: true
            };

            var ctx2 = document.getElementById("barLuz").getContext("2d");
            window.graficabar = new Chart(ctx2, {
                type: 'bar',
                data: barData,
                options: barOptions
            });

        }

        const CargarGraficoLuz2 = (linedata, labels) => {

            if (window.graficalineal) {
                window.graficalineal.clear();
                window.graficalineal.destroy();
            }

            var lineDatax = {
                labels: labels,
                datasets: linedata
            };

            var lineOptions = {
                responsive: true
            };

            var ctx = document.getElementById("lineLuz").getContext("2d");
            window.graficalineal = new Chart(ctx, {
                type: 'line',
                data: lineDatax,
                options: lineOptions
            });
        }
    @endsection
</script>
