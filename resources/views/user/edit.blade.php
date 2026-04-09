@extends('layouts.admin')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4">

        <h4 class="mb-4 text-white">Edit User</h4>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="text-white">Nama</label>
                <input type="text" name="name" class="form-control" 
                       value="{{ $user->name }}" required>
            </div>

            <div class="mb-3">
                <label class="text-white">Email</label>
                <input type="email" name="email" class="form-control" 
                       value="{{ $user->email }}" required>
            </div>

            <div class="mb-3">
                <label class="text-white">Password (opsional)</label>
                <input type="password" name="password" class="form-control">
                <small class="text-light">Kosongkan jika tidak ingin mengganti password</small>
            </div>

            <div class="mb-3">
                <label class="text-white">Role</label>
                <select name="is_admin" class="form-control">
                    <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>User</option>
                    <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <button class="btn btn-success">
                <i class="fa fa-save"></i> Update
            </button>

            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                Kembali
            </a>

        </form>

    </div>
</div>
@endsection