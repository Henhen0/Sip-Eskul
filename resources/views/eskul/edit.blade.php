@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-4 px-4">
<div class="row g-4">
<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h2 class="mb-4">Edit Ekstrakulikuler</h2>
    <form action="{{ route('eskul.update', $eskul) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Eskul</label>
            <input type="text" name="nama_eskul" value="{{ $eskul->nama_eskul }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama Pembina</label>
            <input type="text" name="nama_pembina" value="{{ $eskul->nama_pembina }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>No Handphone</label>
            <input type="text" name="no_hp" value="{{ $eskul->no_hp }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ $eskul->alamat }}" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ $eskul->deskripsi }}</textarea>
        </div>

        <div class="mb-3">
            <label>Foto</label><br>
            <small class="text-muted">
                Kosongkan jika tidak ingin mengubah gambar
            </small>
            @if($eskul->foto)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $eskul->foto) }}" class="img-thumbnail" style="max-width: 300px;">
            </div>
            @endif
            <input type="file" name="foto" class="form-control mt-2">
        </div>
        
        <button class="btn btn-primary">Perbarui</button>
        <a href="{{ route('eskul.index') }}" class="btn btn-light">Kembali</a>
    </form>
</div>
</div>
@endsection
