@extends('layouts.app')

@section('title', 'Editar Nota')

@section('content')
<div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Nota</h1>
    <form action="{{ route('notes.update', $note->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold">Título</label>
            <input type="text" id="title" name="title" value="{{ $note->title }}" 
                class="w-full border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <div class="mb-4">
            <label for="content" class="block text-gray-700 font-bold">Contenido</label>
            <textarea id="content" name="content" rows="4" 
                class="w-full border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200">{{ $note->content }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-bold">Imagen (opcional)</label>
            <input type="file" id="image" name="image" 
                class="w-full text-gray-500 border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-blue-200">
        </div>

        <button type="submit" style="background-color: #007bff; color: white; border: none; padding: 10px 20px; border-radius: 5px; font-size: 16px; cursor: pointer;">
    Actualizar
</button>
    </form>
</div>
@endsection