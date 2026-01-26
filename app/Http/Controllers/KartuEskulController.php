<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\DaftarEskul;

class KartuEskulController extends Controller
{
    public function index(DaftarEskul $daftar)
    {
        // keamanan: user hanya boleh cetak kartunya sendiri
        if ($daftar->user_id !== auth()->id()) {
            abort(403);
        }

        return view('eskul.kartu', compact('daftar'));
    }
}
