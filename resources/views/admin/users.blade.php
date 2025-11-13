@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Panel de Administración de Usuarios</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-lg">Crear Nuevo Usuario</a>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
@endif

<div class="card shadow-sm rounded-4 border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>
                                <span class="badge {{ $user['role'] === 'admin' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($user['role']) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user['id']) }}" class="btn btn-sm btn-warning shadow-sm">Editar</a>
                                <form action="{{ route('admin.users.destroy', $user['id']) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No hay usuarios registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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
    .btn-sm {
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .btn-sm:hover {
        transform: translateY(-1px);
        box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,.1);
    }
    .badge {
        font-weight: 500;
        padding: 0.5em 0.9em;
        font-size: 0.9rem;
    }
</style>
@endpush
