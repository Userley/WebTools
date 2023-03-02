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
        <a href="{{ url('/memorias/imagenes/crear/') }}"> <button class="btn btn-primary col-md-12"><i class="fa fa-file-o"
                    aria-hidden="true"></i> Nuevo registro</button></a>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5><i class="fa fa-filter" aria-hidden="true"></i>
                        Categorias</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-12">
                            <div style="overflow-y: scroll; height:330px">
                                <ul class="list-group" id="listafechas">
                                    @foreach ($Categorias as $categoria)
                                        <li class="list-group-item list-group-item-action"
                                            id="{{ $categoria->idcategoria }}" onclick="">
                                            <strong>{{ $categoria->descripcion }}</strong>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="ibox float-e-margins">

                <div class="ibox-content">

                    <h2>Lightbox image gallery</h2>
                    <p>
                        <strong>blueimp Gallery</strong> is a touch-enabled, responsive and customizable image & video
                        gallery,
                        carousel and lightbox, optimized for both mobile and desktop web browsers.
                        It features swipe, mouse and keyboard navigation, transition effects, slideshow functionality,
                        fullscreen
                        support and on-demand content loading and can be extended to display additional content types.
                        Full documentation you can find at: <a
                            href="https://github.com/blueimp/Gallery/blob/master/README.md"
                            target="_blank">https://github.com/blueimp/Gallery/blob/master/README.md</a>
                    </p>

                    <div class="lightBoxGallery">
                        <a href="img/gallery/1.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/1s.jpg"></a>
                        <a href="img/gallery/2.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/2s.jpg"></a>
                        <a href="img/gallery/3.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/3s.jpg"></a>
                        <a href="img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/4s.jpg"></a>
                        <a href="img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/5s.jpg"></a>
                        <a href="img/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/6s.jpg"></a>
                        <a href="img/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/7s.jpg"></a>
                        <a href="img/gallery/8.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/8s.jpg"></a>
                        <a href="img/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/9s.jpg"></a>
                        <a href="img/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/10s.jpg"></a>
                        <a href="img/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/12s.jpg"></a>
                        <a href="img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/4s.jpg"></a>
                        <a href="img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/5s.jpg"></a>
                        <a href="img/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/6s.jpg"></a>
                        <a href="img/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/7s.jpg"></a>
                        <a href="img/gallery/2.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/2s.jpg"></a>
                        <a href="img/gallery/3.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/3s.jpg"></a>
                        <a href="img/gallery/1.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/1s.jpg"></a>
                        <a href="img/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/9s.jpg"></a>
                        <a href="img/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/10s.jpg"></a>
                        <a href="img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/11s.jpg"></a>
                        <a href="img/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/12s.jpg"></a>
                        <a href="img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/4s.jpg"></a>
                        <a href="img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/5s.jpg"></a>
                        <a href="img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/4s.jpg"></a>
                        <a href="img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/5s.jpg"></a>
                        <a href="img/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/6s.jpg"></a>
                        <a href="img/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/12s.jpg"></a>
                        <a href="img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/4s.jpg"></a>
                        <a href="img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/5s.jpg"></a>
                        <a href="img/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/10s.jpg"></a>
                        <a href="img/gallery/1.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/1s.jpg"></a>
                        <a href="img/gallery/2.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/2s.jpg"></a>
                        <a href="img/gallery/3.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/3s.jpg"></a>
                        <a href="img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/4s.jpg"></a>
                        <a href="img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/5s.jpg"></a>
                        <a href="img/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/6s.jpg"></a>
                        <a href="img/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/7s.jpg"></a>
                        <a href="img/gallery/8.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/8s.jpg"></a>
                        <a href="img/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/9s.jpg"></a>
                        <a href="img/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/10s.jpg"></a>
                        <a href="img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/11s.jpg"></a>
                        <a href="img/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/12s.jpg"></a>
                        <a href="img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/4s.jpg"></a>
                        <a href="img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/5s.jpg"></a>
                        <a href="img/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/6s.jpg"></a>
                        <a href="img/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/7s.jpg"></a>
                        <a href="img/gallery/2.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/2s.jpg"></a>
                        <a href="img/gallery/3.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/3s.jpg"></a>
                        <a href="img/gallery/1.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/1s.jpg"></a>
                        <a href="img/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/9s.jpg"></a>
                        <a href="img/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/10s.jpg"></a>
                        <a href="img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/11s.jpg"></a>
                        <a href="img/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/12s.jpg"></a>
                        <a href="img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/4s.jpg"></a>
                        <a href="img/gallery/7.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/7s.jpg"></a>
                        <a href="img/gallery/8.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/8s.jpg"></a>
                        <a href="img/gallery/9.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/9s.jpg"></a>
                        <a href="img/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/10s.jpg"></a>
                        <a href="img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/11s.jpg"></a>
                        <a href="img/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/12s.jpg"></a>
                        <a href="img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/4s.jpg"></a>
                        <a href="img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/5s.jpg"></a>
                        <a href="img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/5s.jpg"></a>
                        <a href="img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/4s.jpg"></a>
                        <a href="img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/5s.jpg"></a>
                        <a href="img/gallery/6.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/6s.jpg"></a>
                        <a href="img/gallery/12.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/12s.jpg"></a>
                        <a href="img/gallery/4.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/4s.jpg"></a>
                        <a href="img/gallery/5.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/5s.jpg"></a>
                        <a href="img/gallery/10.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/10s.jpg"></a>
                        <a href="img/gallery/11.jpg" title="Image from Unsplash" data-gallery=""><img
                                src="img/gallery/11s.jpg"></a>

                        <div id="blueimp-gallery" class="blueimp-gallery">
                            <div class="slides"></div>
                            <h3 class="title"></h3>
                            <a class="prev">‹</a>
                            <a class="next">›</a>
                            <a class="close">×</a>
                            <a class="play-pause"></a>
                            <ol class="indicator"></ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
