@extends('layouts.app')

@section('title', 'Editar Especie')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-white border-0">
            <h1 class="h3 mb-0 fw-bold">Editar Especie: {{ $species['species_name'] }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.species.update', $species['id_species']) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.species.form', [
                    'species' => $species,
                    'buttonText' => 'Actualizar Especie'
                ])
            </form>
        </div>
    </div>
</div>
@endsection
