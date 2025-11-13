@extends('layouts.app')

@section('title', 'Gestión de Refugios')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Gestión de Refugios</h1>
        <a href="{{ route('admin.shelters.create') }}" class="btn btn-primary">Añadir Refugio</a>
    </div>

    {{-- Mensajes de alerta --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm rounded" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show shadow-sm rounded" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    <div class="card shadow-sm rounded-4">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Email de Contacto</th>
                        <th>Teléfono</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($shelters as $shelter)
                        <tr>
                            <td>{{ $shelter['shelter_name'] }}</td>
                            <td>{{ $shelter['contact_email'] }}</td>
                            <td>{{ $shelter['phone'] }}</td>
                            <td class="text-end d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.shelters.edit', $shelter['id_shelter']) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('admin.shelters.destroy', $shelter['id_shelter']) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este refugio?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No hay refugios registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
