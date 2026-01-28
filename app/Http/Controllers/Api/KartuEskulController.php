<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarEskul;
use Illuminate\Support\Facades\Auth;

class KartuEskulController extends Controller
{
    /**
     * GET /api/kartu/{id}
     */
    public function show($id)
    {
        $daftar = DaftarEskul::with(['user', 'eskul'])->findOrFail($id);

        // keamanan: hanya user sendiri
        if ($daftar->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Akses ditolak'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'data' => $daftar
        ]);
    }
}
