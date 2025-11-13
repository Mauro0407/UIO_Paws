@extends('layouts.app')

@section('title', 'Gestión de Especies')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-primary">
            <i class="bi bi-list-ul me-2"></i>Gestión de Especies
        </h1>
        <a href="{{ route('admin.species.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Añadir Especie
        </a>
    </div>

    @include('partials.alerts')

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre de la Especie</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($species as $specie)
                        <tr>
                            <td class="fw-semibold">{{ $specie['species_name'] }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.species.edit', $specie['id_species']) }}"
                                   class="btn btn-sm btn-warning me-1">
                                   <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <form action="{{ route('admin.species.destroy', $specie['id_species']) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('¿Estás seguro de eliminar esta especie?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center text-muted py-3">
                                <i class="bi bi-emoji-frown me-1"></i> No hay especies registradas aún.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
