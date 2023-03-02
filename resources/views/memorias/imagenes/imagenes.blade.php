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
<div class="d-flex align-content-center">
    <a href="{{ url('/servicios/internet/crear/') }}"> <button class="btn btn-primary col-md-12"><i class="fa fa-file-o"
                aria-hidden="true"></i> Nuevo registro</button></a>
</div>
<hr>


@endsection
