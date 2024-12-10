<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota - {{ $note->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .note-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>{{ $note->title }}</h1>
    <p>{{ $note->content }}</p>

    @if($note->image)
    <div>
        <img src="{{ public_path('storage/' . $note->image) }}" alt="Imagen de la nota" class="note-image">
    </div>
    @endif
</body>
</html>