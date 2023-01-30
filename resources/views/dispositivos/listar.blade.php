@extends('layouts.plantilla')

@section('title', 'Home')

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
        </ol>
    </div>
@endsection

@section('content')
    <h1>Mi página prinicpal</h1>

    <a href="{{ url('/dispositivos/crear/') }}"> <button class="btn btn-primary">Nuevo Dispositivo</button></a>
@endsection
