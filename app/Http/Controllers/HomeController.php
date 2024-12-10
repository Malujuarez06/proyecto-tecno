<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Método index
    public function index()
    {
        // Redirigir o mostrar la vista principal
        return view('notes'); // Asegúrate de tener la vista 'home' en resources/views
    }

    // Método dashboard
    public function dashboard()
    {
        // Lógica del dashboard
        return view('dashboard'); // Asegúrate de tener la vista 'dashboard' en resources/views
}
}