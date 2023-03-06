
<div class="d-flex justify-content-end" id="ad_data">
    {!! $Imagenes->links('pagination::bootstrap-5') !!}
</div>
@foreach ($Imagenes as $imagen)
    <a href="{{ $imagen->imagen }}" title="{{ $imagen->idimagenes }}.{{ $imagen->titulo }}" data-gallery="">
        <img src="{{ $imagen->imagen }}"
            style="width: 100px;height: 100px;object-fit: cover;" /></a>
@endforeach