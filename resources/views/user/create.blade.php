@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4">

        <h4 class="mb-4 text-white">Tambah User</h4>

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="text-white">Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="text-white">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="text-white">Password</label>

                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control" required>

                    <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                    </span>
                </div>
            </div>

            <div class="mb-3">
                <label class="text-white">Role</label>
                <select name="is_admin" class="form-control-dark form-control" required>
                    <option value="0">User</option>
                    <option value="1">Admin</option>
                </select>
            </div>

            <button class="btn btn-success">
                <i class="fa fa-save"></i> Simpan
            </button>

            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                Kembali
            </a>

        </form>

    </div>
</div>
@endsection