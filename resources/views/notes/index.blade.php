@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-4xl font-semibold text-gray-800 mb-6">Mis Notas</h2>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('notes.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control py-3" name="search" placeholder="Buscar notas..." value="{{ request()->get('search') }}">
            <button class="btn btn-primary py-3" type="submit">Buscar</button>
        </div>
    </form>

    <!-- Botón para crear nueva nota -->
    <a href="{{ route('notes.create') }}" class="btn btn-success mb-4 px-6 py-3 rounded-lg shadow-lg hover:bg-green-600 transition duration-300 ease-in-out">
        Crear Nueva Nota
    </a>

    <!-- Lista de notas -->
    <ul class="list-group">
        @foreach($notes as $note)
        <li class="list-group-item d-flex justify-content-between align-items-center border border-gray-300 rounded-lg mb-4 p-4 shadow-lg hover:shadow-xl transition duration-300 ease-in-out">
            <div class="d-flex align-items-center">
                <!-- Mostrar imagen de la nota si existe -->
                @if($note->image)
                <img src="{{ asset('storage/' . $note->image) }}" alt="Imagen de la nota" class="img-thumbnail me-3" style="width: 100px; height: auto;">
                @endif
                <a href="{{ route('notes.show', $note) }}" class="text-decoration-none text-dark font-bold text-lg hover:text-blue-500 transition duration-300 ease-in-out">{{ $note->title }}</a>
            </div>
            <div class="btn-group">
                <a href="{{ route('notes.edit', $note) }}" class="btn btn-warning btn-sm mx-1 px-4 py-2 rounded-lg shadow-sm hover:bg-yellow-600 transition duration-300 ease-in-out">
                    <i class="fas fa-edit"></i> Editar
                </a>
                <form action="{{ route('notes.destroy', $note) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm mx-1 px-4 py-2 rounded-lg shadow-sm hover:bg-red-600 transition duration-300 ease-in-out">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </button>
                </form>
                <!-- Botón de generar PDF -->
                <a href="{{ route('notes.downloadPDF', $note) }}" class="btn btn-info btn-sm mx-1 px-4 py-2 rounded-lg shadow-sm hover:bg-blue-600 transition duration-300 ease-in-out">
                    <i class="fas fa-file-pdf"></i> PDF
                </a>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection