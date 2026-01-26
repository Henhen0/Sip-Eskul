<?php

namespace App\Http\Controllers;

use App\Models\DaftarEskul;
use App\Models\Eskul;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // 🔒 BLOK USER BIASA
        if (Auth::user()->is_admin !== 1) {
            abort(403, 'Akses khusus admin');
            // atau:
            return redirect('/')->with('error', 'Akses khusus admin');
        }

        // 📊 DATA DASHBOARD ADMIN
        $jumlahEskul   = Eskul::count();
        $jumlahSiswa   = DaftarEskul::count();
        $jumlahDitolak = DaftarEskul::where('status', 'Ditolak')->count();
        $keterima      = DaftarEskul::where('status', 'Diterima')->count();

        return view('home', compact(
            'jumlahEskul',
            'jumlahSiswa',
            'jumlahDitolak',
            'keterima'
        ));
    }
}
