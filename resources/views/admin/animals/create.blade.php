@extends('layouts.app')

@section('title', 'Añadir Animal')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm rounded-4">
        <div class="card-header">
            <h1 class="h3 mb-0">Añadir Nuevo Animal</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.animals.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('partials.alerts') <!-- Para mostrar errores o mensajes -->

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre del Animal</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="id_species" class="form-label">Especie</label>
                    <select class="form-select @error('id_species') is-invalid @enderror" id="id_species" name="id_species" required>
                        <option value="">Selecciona una especie...</option>
                        @foreach($species as $specie)
                            <option value="{{ $specie['id_species'] }}" {{ old('id_species') == $specie['id_species'] ? 'selected' : '' }}>
                                {{ $specie['species_name'] }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_species')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="id_breed" class="form-label">Raza</label>
                    <select class="form-select @error('id_breed') is-invalid @enderror" id="id_breed" name="id_breed" required>
                        <option value="">Selecciona una raza...</option>
                        @foreach($breeds as $breed)
                            <option value="{{ $breed['id_breed'] }}" {{ old('id_breed') == $breed['id_breed'] ? 'selected' : '' }}>
                                {{ $breed['breed_name'] }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_breed')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">Edad (años)</label>
                    <input type="number" min="0" class="form-control @error('age') is-invalid @enderror" id="age" name="age" value="{{ old('age') }}" required>
                    @error('age')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Foto del Animal</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
                    @error('photo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Crear Animal</button>
                    <a href="{{ route('admin.animals.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
