<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Eskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EskulController extends Controller
{
    /**
     * GET /api/eskul
     */
    public function index(Request $request)
    {
        $query = Eskul::query();

        if ($request->search) {
            $query->where('nama_eskul', 'like', '%' . $request->search . '%');
        }

        $eskul = $query->get();

        return response()->json([
            'success' => true,
            'data' => $eskul
        ]);
    }

    /**
     * GET /api/eskul/{id}
     */
    public function show($id)
    {
        $eskul = Eskul::with('jadwals')->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $eskul
        ]);
    }

    
}
