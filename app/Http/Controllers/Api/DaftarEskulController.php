<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarEskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarEskulController extends Controller
{
    /**
     * GET /api/daftar
     */
    public function index(Request $request)
    {
        $query = DaftarEskul::with(['user', 'eskul']);

        if ($request->search) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            })->orWhereHas('eskul', function ($q) use ($request) {
                $q->where('nama_eskul', 'like', '%' . $request->search . '%')
                    ->orWhere('kelas', 'like', '%' . $request->search . '%')
                    ->orWhere('tahun_ajaran', 'like', '%' . $request->search . '%');
            });
        }

        return response()->json([
            'success' => true,
            'data' => $query->get()
        ]);
    }

    /**
     * POST /api/daftar
     */
    public function store(Request $request)
    {
        $request->validate([
            'eskul_id' => 'required|exists:eskuls,id',
            'kelas' => 'required',
            'tahun_ajaran' => 'required',
            'no_telp' => 'nullable',
            'alasan' => 'nullable'
        ]);

        $daftar = DaftarEskul::create([
            'user_id' => Auth::id(),
            'eskul_id' => $request->eskul_id,
            'kelas' => $request->kelas,
            'tahun_ajaran' => $request->tahun_ajaran,
            'no_telp' => $request->no_telp,
            'alasan' => $request->alasan,
            'status' => 'Menunggu',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Pendaftaran berhasil',
            'data' => $daftar
        ], 201);
    }

    /**
     * GET /api/daftar/{id}
     */
    public function show($id)
    {
        $daftar = DaftarEskul::with(['user', 'eskul'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $daftar
        ]);
    }

}
