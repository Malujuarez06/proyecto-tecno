<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Mostrar todas las notas
    public function index(Request $request)
    {
        $search = $request->get('search');
        $notes = Note::when($search, function($query) use ($search) {
            return $query->where('title', 'like', "%$search%");
        })->get();
        
        return view('notes.index', compact('notes'));
    }

    // Mostrar una sola nota
    public function show(Note $note)
    {
        return view('notes.show', compact('note'));
    }

    // Crear una nueva nota
    public function create()
    {
        return view('notes.create');
    }

    // Guardar una nueva nota
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $note = new Note;
        $note->title = $request->title;
        $note->content = $request->content;

        // Subir la imagen si se proporciona
        if ($request->hasFile('image')) {
            // Guardar la imagen en el almacenamiento público
            $imagePath = $request->file('image')->store('images', 'public');
            $note->image = $imagePath; // Almacenar la ruta de la imagen en la base de datos
        }

        $note->save(); // Guardar la nota

        return redirect()->route('notes.index');
    }

    // Editar nota
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    // Actualizar nota
    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $note->title = $request->title;
        $note->content = $request->content;

        // Subir la imagen si se proporciona
        if ($request->hasFile('image')) {
            // Eliminar la imagen anterior si existe
            if ($note->image) {
                Storage::delete('public/' . $note->image);
            }
            // Subir y guardar la nueva imagen
            $imagePath = $request->file('image')->store('images', 'public');
            $note->image = $imagePath;
        }

        $note->save();

        return redirect()->route('notes.index');
    }

    // Eliminar nota
    public function destroy(Note $note)
    {
        // Eliminar la imagen antes de eliminar la nota
        if ($note->image) {
            Storage::delete('public/' . $note->image);
        }
        $note->delete();
        
        return redirect()->route('notes.index');
    }

    // Descargar PDF de la nota
    public function downloadPDF(Note $note)
    {
        $pdf = PDF::loadView('pdf.note', compact('note'));
        return $pdf->download('note.pdf');
}
}