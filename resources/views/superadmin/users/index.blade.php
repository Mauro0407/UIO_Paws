@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="container mt-5">
    {{-- Encabezado con botón --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold mb-0">Gestión de Usuarios</h1>
        <a href="{{ route('superadmin.users.create') }}" class="btn btn-primary shadow-sm fw-bold">Crear Nuevo Usuario</a>
    </div>

    {{-- Tabla de usuarios --}}
    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user['id_user'] }}</td>
                            <td>{{ $user['first_name'] }} {{ $user['last_name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>
                                @if(!empty($user['roles']))
                                    @php
                                        $role = $user['roles'][0]['name'];
                                        $badgeClass = match($role) {
                                            'Superadmin' => 'bg-danger',
                                            'Admin' => 'bg-warning text-dark',
                                            'Usuario' => 'bg-info text-dark',
                                            default => 'bg-secondary'
                                        };
                                    @endphp
                                    <span class="badge {{ $badgeClass }}">{{ $role }}</span>
                                @else
                                    <span class="badge bg-secondary">Sin rol</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('superadmin.users.edit', $user['id_user']) }}" class="btn btn-sm btn-warning me-1 shadow-sm">Editar</a>
                                <form action="{{ route('superadmin.users.destroy', $user['id_user']) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de que quieres eliminar a este usuario? Esta acción no se puede deshacer.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger shadow-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">No hay usuarios registrados.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Paginación si aplica --}}
            @if(isset($users) && method_exists($users, 'links'))
            <div class="d-flex justify-content-center mt-4">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.05);
    }
    .badge {
        font-size: 0.9rem;
        padding: 0.4em 0.7em;
    }
</style>
@endpush
