Hola :)

@foreach ($imagenes as $imagen)
    <p>{{ $imagen->titulo }}
        <img src="{{ $imagen->imagen }}" alt="" width="80px">
    </p>
@endforeach
