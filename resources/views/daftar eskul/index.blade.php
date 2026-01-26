@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h2 class="mb-4">Data Masuk Eskul</h2>

        <form action="{{ route('daftar.index') }}" method="GET" class="d-flex mb-4">
            <input name="search" value="{{ request('search') }}"
                class="form-control bg-dark border-0 text-white" type="search" placeholder="Cari nama siswa...">
            <button class="btn btn-success ms-2" type="submit">Cari</button>
        </form>

        <table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Nama Eskul</th>
            <th>Tahun Ajaran</th>
            <th>No Telepon</th>
            <th>Alasan</th>
            <th>Status</th>
            <th>Aksi</th>
            <th>Persetujuan</th>
        </tr>         
    </thead>
    <tbody>
        @forelse ($daftar as $data)
        <tr>
            <th>{{ $loop->iteration }}</th>
            <td>{{ $data->user->name ?? '-' }}</td>
            <td>{{ $data->kelas }}</td>
            <td>{{ $data->eskul->nama_eskul }}</td>
            <td>{{ $data->tahun_ajaran }}</td>
            <td>{{ $data->no_telp }}</td>
            <td>{{ $data->alasan }}</td>
            <td>
                @if($data->status == 'Diterima')
                    <span class="badge bg-success">Diterima</span>
                @elseif($data->status == 'Ditolak')
                    <span class="badge bg-danger">Ditolak</span>
                @else
                    <span class="badge bg-warning text-dark">Menunggu</span>
                @endif
            </td>
            <td>
                <form method="POST" action="{{ route('daftar.destroy', $data->id) }}" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary btn-sm mb-1">HAPUS</button>
                </form>

                <td>
                    <form action="{{ route('penerimaan.store') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="daftar_id" value="{{ $data->id }}">
                        <input type="hidden" name="catatan" value="Diterima">
                        <button type="submit" class="btn btn-success btn-sm">✔</button>
                    </form>

                    <form action="{{ route('penerimaan.store') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="daftar_id" value="{{ $data->id }}">
                        <input type="hidden" name="catatan" value="Ditolak">
                        <button type="submit" class="btn btn-danger btn-sm">✖</button>
                    </form>
                </td>
            </td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
    </div>
</div>
@endsection
