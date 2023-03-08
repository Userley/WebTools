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

    <div class="row">
        <div class="col-md-6">
            <div class="ibox float-e-margins animated fadeInRight">
                <div class="ibox-title">
                    <h5>Monto Mensual x Piso</h5>
                </div>
                <div class="ibox-content">
                    <div>
                        <canvas id="lineChart" height="140"></canvas>
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
                        <canvas id="barChart" height="140"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


<script>
    @section('functions')
        var barData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                    label: "Data 1",
                    backgroundColor: 'rgba(220, 220, 220, 0.5)',
                    pointBorderColor: "#fff",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "Data 2",
                    backgroundColor: 'rgba(26,179,148,0.5)',
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: [28, 48, 40, 19, 86, 27, 90]
                },
                {
                    label: "Data 3",
                    backgroundColor: 'rgba(216,129,148,0.5)',
                    borderColor: "rgba(216,129,148,0.7)",
                    pointBackgroundColor: "rgba(216,129,148,1)",
                    pointBorderColor: "#fff",
                    data: [45, 70, 84, 89, 26, 15, 27]
                }
            ]
        };

        var barOptions = {
            responsive: true
        };


        var ctx2 = document.getElementById("barChart").getContext("2d");
        new Chart(ctx2, {
            type: 'bar',
            data: barData,
            options: barOptions
        });


        var lineData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [

                {
                    label: "Data 1",
                    backgroundColor: 'rgba(26,179,148,0.5)',
                    borderColor: "rgba(26,179,148,0.7)",
                    pointBackgroundColor: "rgba(26,179,148,1)",
                    pointBorderColor: "#fff",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }, {
                    label: "Data 2",
                    backgroundColor: 'rgba(220, 220, 220, 0.5)',
                    pointBorderColor: "#fff",
                    data: [65, 59, 80, 81, 56, 55, 40]
                }
            ]
        };

        var lineOptions = {
            responsive: true
        };


        var ctx = document.getElementById("lineChart").getContext("2d");
        new Chart(ctx, {
            type: 'line',
            data: lineData,
            options: lineOptions
        });
    @endsection
</script>
