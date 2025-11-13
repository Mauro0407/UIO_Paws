@extends('layouts.app')

@section('title', 'Añadir Especie')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-white border-0">
            <h1 class="h3 mb-0 fw-bold">Añadir Nueva Especie</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.species.store') }}" method="POST">
                @csrf
                @include('admin.species.form', ['buttonText' => 'Crear Especie'])
            </form>
        </div>
    </div>
</div>
@endsection
