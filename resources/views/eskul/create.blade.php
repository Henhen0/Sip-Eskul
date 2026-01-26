@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-4 px-4">
<div class="row g-4">
<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h2 class="mb-4">Tambah Eskul</h2>
        <form action="{{ route('eskul.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Eskul</label>
                <input type="text" class="form-control" name="nama_eskul">
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Pembina</label>
                <input type="text" class="form-control" name="nama_pembina">
            </div>

            <div class="mb-3">
                <label class="form-label">No Handphone</label>
                <input type="text" class="form-control" name="no_hp">
            </div>

            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat">
            </div>

            <div class="mb-3">
                <label class="form-label">Foto Eskul</label>

                <input class="form-control bg-dark" type="file" name="foto" accept="image/*">
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control" placeholder="Masukan deskripsi" style="height: 150px;" name="deskripsi"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Tambah</button>

        </form>
    </div>
</div>
@endsection
