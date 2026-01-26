@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h2 class="mb-4">Data Penambahan Eskul</h2>

        <form action="{{ route('eskul.index') }}" method="GET" class="d-flex mb-4">
            <input name="search" value="{{ request('search') }}"
                class="form-control bg-dark border-0 text-white" type="search" placeholder="Cari nama ekskul...">
            <button class="btn btn-success ms-2" type="submit">Cari</button>
        </form>

        <a href="{{ route('eskul.create') }}" class="btn btn-primary d-flex justify-content-center align-items-center"><b>Tambah +</b></a><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Eskul</th>
                    <th scope="col">Nama Pembina</th>
                    <th scope="col">No Handphone</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>         
            </thead>

            <tbody>
                @forelse ($eskul as $data)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $data->nama_eskul }}</td>
                    <td>{{ $data->nama_pembina }}</td>
                    <td>{{ $data->no_hp }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$data->foto) }}" width="65">
                    </td>
                    <td>{{ \Illuminate\Support\Str::limit($data->deskripsi, 10) }}</td>

                    <td>
                    <form  method="POST" action="{{ route('eskul.destroy', $data->id) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('eskul.edit', $data->id) }}" class="btn btn-success">EDIT</a>
                        <button type="submit" class="btn btn-primary">DELETE</button>
                    </form>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
