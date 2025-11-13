@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="mb-4">
    <h1 class="fw-bold">Editar Usuario: {{ $user['name'] }}</h1>
</div>

<div class="card shadow-sm rounded-4 border-0">
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user['id']) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Rol</label>
                <select name="role" id="role" class="form-select" required>
                    <option value="user" {{ $user['role'] == 'user' ? 'selected' : '' }}>Usuario</option>
                    <option value="admin" {{ $user['role'] == 'admin' ? 'selected' : '' }}>Administrador</option>
                </select>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary shadow-sm">Cancelar</a>
                <button type="submit" class="btn btn-primary shadow-sm">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        transition: transform .2s ease-in-out, box-shadow .2s ease-in-out;
    }
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.75rem 1.5rem rgba(0,0,0,.15)!important;
    }
    .btn {
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,.1);
    }
</style>
@endpush
