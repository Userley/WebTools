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
        new Chart(ctx2, {
            type: 'bar',
            data: barData,
            options: barOptions
        });


        // var lineData = {
        //     labels: Resp.meses,
        //     datasets: Resp.data.sort()
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
    @endsection
</script>
