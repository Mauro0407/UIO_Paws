@csrf

{{-- Alertas de validación --}}
@include('partials.alerts')

<div class="mb-3">
    <label for="id_species" class="form-label d-flex justify-content-between align-items-center">
        <span>Especie</span>
        <a href="{{ route('admin.species.create') }}" target="_blank" class="btn btn-sm btn-outline-success">+ Nueva Especie</a>
    </label>

    <select class="form-select @error('id_species') is-invalid @enderror" id="id_species" name="id_species" required>
        <option value="">Selecciona una especie...</option>
        @foreach($species as $specie)
            <option value="{{ $specie['id_species'] }}" {{ old('id_species', $breed['id_species'] ?? '') == $specie['id_species'] ? 'selected' : '' }}>
                {{ $specie['species_name'] }}
            </option>
        @endforeach
    </select>
    @error('id_species')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="breed_name" class="form-label">Nombre de la Raza</label>
    <input type="text" class="form-control @error('breed_name') is-invalid @enderror" id="breed_name" name="breed_name" value="{{ old('breed_name', $breed['breed_name'] ?? '') }}" required>
    @error('breed_name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mt-3">
    <button type="submit" class="btn btn-success">{{ $buttonText }}</button>
    <a href="{{ route('admin.breeds.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
