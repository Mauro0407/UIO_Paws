@extends('layouts.app')

@section('title', 'Crear Nuevo Usuario')

@section('content')
<div class="container mt-5">
    {{-- Título --}}
    <div class="text-center mb-4">
        <h1 class="display-5 fw-bold">Crear Nuevo Usuario</h1>
    </div>

    {{-- Formulario dentro de tarjeta --}}
    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <form action="{{ route('superadmin.users.store') }}" method="POST">
                @csrf

                @include('superadmin.users.form', ['user' => null])

                {{-- Botones de acción --}}
                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{ route('superadmin.users.index') }}" class="btn btn-secondary btn-lg rounded-pill shadow-sm fw-bold">Cancelar</a>
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm fw-bold">Crear Usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
    .card {
        padding: 1.5rem;
    }
</style>
@endpush
