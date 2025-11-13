@extends('layouts.app')

@section('title', 'Editar Animal')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm rounded-4">
        <div class="card-header">
            <h1 class="h3 mb-0">Editar Animal: {{ $animal['animal_name'] }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.animals.update', $animal['id_animal']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('partials.alerts') <!-- Para mostrar errores o mensajes -->

                <!-- Partial Form -->
                @include('admin.animals.form', [
                    'animal' => $animal,
                    'buttonText' => 'Actualizar Animal'
                ])
            </form>
        </div>
    </div>
</div>
@endsection
