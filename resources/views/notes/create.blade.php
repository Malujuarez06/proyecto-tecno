@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4" style="font-size: 24px; color: #333; font-weight: bold;">Crear Nueva Nota</h2>
    <form method="POST" action="{{ route('notes.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Título -->
        <div class="mb-3">
            <label for="title" class="form-label" style="font-size: 16px; color: #555;">Título</label>
            <input type="text" class="form-control" name="title" required style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; font-size: 16px; width: 100%;">
        </div>

        <!-- Contenido -->
        <div class="mb-3">
            <label for="content" class="form-label" style="font-size: 16px; color: #555;">Contenido</label>
            <textarea class="form-control" name="content" required style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; font-size: 16px; width: 100%; height: 150px;"></textarea>
        </div>

        <!-- Imagen -->
        <div class="mb-3">
            <label for="image" class="form-label" style="font-size: 16px; color: #555;">Imagen (opcional)</label>
            <input type="file" class="form-control" name="image" style="padding: 12px; border-radius: 8px; border: 1px solid #ccc; font-size: 16px; width: 100%;">
        </div>

        <!-- Botón -->
        <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: white; border: none; padding: 12px 25px; border-radius: 8px; font-size: 16px; cursor: pointer;">
            Guardar
        </button>
    </form>
</div>
@endsection