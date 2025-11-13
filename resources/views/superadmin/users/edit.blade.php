@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="container mt-5">
    {{-- Título --}}
    <div class="text-center mb-4">
        <h1 class="display-5 fw-bold">Editar Usuario: {{ $user['first_name'] }} {{ $user['last_name'] }}</h1>
    </div>

    {{-- Formulario dentro de tarjeta --}}
    <div class="card shadow-sm rounded-4">
        <div class="card-body">
            <form action="{{ route('superadmin.users.update', $user['id_user']) }}" method="POST">
                @csrf
                @method('PUT')

                @include('superadmin.users.form')

                {{-- Botones de acción --}}
                <div class="mt-4 d-flex justify-content-between">
                    <a href="{{ route('superadmin.users.index') }}" class="btn btn-secondary btn-lg rounded-pill shadow-sm fw-bold">Cancelar</a>
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm fw-bold">Guardar Cambios</button>
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
