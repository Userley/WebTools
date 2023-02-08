@extends('layouts.plantilla')

@section('title', 'Contactos')

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
        </ol>
    </div>
@endsection

@section('content')

    <div class="d-flex align-content-center">
        <a href="{{ url('/contactos/crear/') }}"> <button class="btn btn-primary col-md-12">Nuevo Contacto</button></a>
    </div>



    <hr>
    <div class="row">
        @foreach ($contactos as $contacto)
            <div class="col-lg-3">
                <div class="contact-box center-version">

                    <a href="profile.html">

                        <img alt="image" class="img-circle" src="{{ $contacto->avatar }}">


                        <h3 class="m-b-xs"><strong>{{ $contacto->nombres }}</strong></h3>

                        <div class="font-bold">{{ $contacto->cargo }}</div>
                        <address class="m-t-md">
                            <strong>{{ $contacto->organizacion }}</strong><br>
                            {{ $contacto->direccion }}<br>
                            {{ $contacto->ciudad }}<br>
                            <abbr title="Phone">P:</abbr> (051) {{ $contacto->telefono }} - <abbr title="Phone">P:</abbr> {{ $contacto->celular }}
                        </address>

                    </a>
                    <div class="contact-box-footer">
                        <div class="m-t-xs btn-group">
                            <a class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                            <a class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                            <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>


@endsection
