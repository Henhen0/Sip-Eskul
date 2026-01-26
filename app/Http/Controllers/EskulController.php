<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Eskul::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_eskul', 'like', '%' . $request->search . '%');
        }

        $eskul = Eskul::all();
        $eskul = $query->get();

        return view('eskul.index', compact('eskul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eskul.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_eskul' => 'required|string|max:255',
            'nama_pembina' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        $FotoPath = null;
        if ($request->hasFile('foto')) {
            $FotoPath = $request->file('foto')->store('foto_eskul', 'public');
        }

        $eskul = new Eskul();
        $eskul->nama_eskul = $request->nama_eskul;
        $eskul->nama_pembina = $request->nama_pembina;
        $eskul->no_hp = $request->no_hp;
        $eskul->alamat = $request->alamat;
        $eskul->deskripsi = $request->deskripsi;
        $eskul->foto = $FotoPath;
        $eskul->save();

        return redirect()->route('eskul.index')->with('success', 'Data eskul berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    $eskul = Eskul::with('jadwals')->findOrFail($id);
    return view('eskul.detail', compact('eskul'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Eskul $eskul)
    {
        return view('eskul.edit', compact('eskul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Eskul $eskul)
    {
        $request->validate([
            'nama_eskul' => 'required|string|max:255',
            'nama_pembina' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'nullable|string',
        ]);
        $FotoPath = $eskul->foto;
        if ($request->hasFile('foto')) {
            if ($eskul->foto) {
                // tambahkan : use Illuminate\Support\Facades\Storage; diatas untuk memanggil class 'Storage' !!
                Storage::disk('public')->delete($eskul->foto);
            }
            $FotoPath = $request->file('foto')->store('foto_eskul', 'public');
        }

        $eskul->nama_eskul = $request->nama_eskul;
        $eskul->nama_pembina = $request->nama_pembina;
        $eskul->no_hp = $request->no_hp;
        $eskul->alamat = $request->alamat;
        $eskul->deskripsi = $request->deskripsi;
        $eskul->foto = $FotoPath;
        $eskul->save();

        return redirect()->route('eskul.index')->with('update', 'Data eskul berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eskul $eskul)
    {
        $eskul->delete();
        return redirect()->route('eskul.index')->with('delete', 'Data eskul berhasil dihapus.');
    }
}
