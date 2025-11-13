@extends('layouts.app')

@section('title', 'Panel de Super Administrador')

@section('content')
<div class="container mt-5">
    {{-- Encabezado --}}
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Panel de Super Administrador</h1>
        <p class="lead text-muted">Bienvenido, {{ Session::get('user_name') }}. Desde aquí tienes control total sobre los usuarios del sistema.</p>
    </div>

    {{-- Tarjeta principal --}}
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm rounded-4 h-100">
                <div class="card-body d-flex flex-column justify-content-between text-center">
                    <h5 class="card-title fw-bold">Gestión de Usuarios</h5>
                    <p class="card-text text-muted">Crea nuevos administradores, edita perfiles de usuario o elimina cuentas del sistema.</p>
                    <a href="{{ route('superadmin.users.index') }}" class="btn btn-danger btn-lg shadow-sm fw-bold mt-3">Administrar Usuarios</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card h5 {
        font-size: 1.25rem;
    }
    .btn-lg {
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
    }
</style>
@endpush
