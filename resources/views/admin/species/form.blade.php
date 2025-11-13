@csrf

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <strong>¡Error!</strong> Corrige los siguientes campos:
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
@endif

<div class="mb-3">
    <label for="species_name" class="form-label fw-semibold">Nombre de la Especie</label>
    <input type="text" class="form-control" id="species_name" name="species_name"
           value="{{ old('species_name', $species['species_name'] ?? '') }}"
           placeholder="Ej: Perro, Gato..." required>
</div>

<div class="d-flex justify-content-start gap-2">
    <button type="submit" class="btn btn-success shadow-sm">
        <i class="bi bi-check-circle me-1"></i> {{ $buttonText }}
    </button>
    <a href="{{ route('admin.species.index') }}" class="btn btn-secondary shadow-sm">
        <i class="bi bi-x-circle me-1"></i> Cancelar
    </a>
</div>
