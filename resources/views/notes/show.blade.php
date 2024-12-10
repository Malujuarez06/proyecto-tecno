@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $note->title }}</h2>
    <p>{{ $note->content }}</p>

    <!-- Mostrar la imagen si existe -->
    @if($note->image)
        <div>
            <img src="{{ asset('storage/' . $note->image) }}" alt="Imagen de la nota" class="img-fluid">
        </div>
    @endif
</div>
@endsection