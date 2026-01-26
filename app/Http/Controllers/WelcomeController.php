<?php

namespace App\Http\Controllers;

use App\Models\Eskul;

class WelcomeController extends Controller
{
    public function index()
    {
        // Hitung total eskul
        $totalEskul = Eskul::count();

        // Ambil data eskul
        $eskul = Eskul::all();

        return view('welcome', compact('totalEskul', 'eskul'));
    }
}
