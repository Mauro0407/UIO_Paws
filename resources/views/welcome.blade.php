@extends('layouts.app')

@section('title', 'Bienvenido a UIO Paws')

@section('content')
<div class="container mt-5">
    {{-- Sección de bienvenida --}}
    <div class="text-center mb-5 p-5 bg-light rounded-4 shadow-sm position-relative overflow-hidden">
        <h1 class="display-4 fw-bold mb-3">¡Encuentra a tu nuevo mejor amigo!</h1>
        <p class="lead text-muted mb-4">Explora los perfiles de cientos de animales que esperan un hogar lleno de amor.</p>
        <hr class="my-4">
        <p class="text-muted mb-4">Tu apoyo puede cambiar una vida. Adopta, hazte voluntario o dona.</p>
        <a class="btn btn-primary btn-lg mt-3 shadow-sm" href="{{ route('public.animals.index') }}">Ver Animales para Adoptar</a>
        {{-- Fondo decorativo --}}
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: url('/images/pets-bg.jpg') no-repeat center/cover; opacity: 0.1; z-index: -1;"></div>
    </div>

    {{-- Estadísticas rápidas --}}
    <div class="row g-4 text-center mt-5">
        <div class="col-md-3">
            <div class="card shadow-sm rounded-4 p-4 h-100 border-0">
                <div class="mb-2"><i class="bi bi-people-fill display-6 text-primary"></i></div>
                <h5 class="fw-bold">Usuarios Registrados</h5>
                <p class="display-6 text-primary mb-1">{{ $stats['users'] ?? 0 }}</p>
                <small class="text-muted">En la plataforma</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm rounded-4 p-4 h-100 border-0">
                <div class="mb-2"><i class="bi bi-heart-fill display-6 text-success"></i></div>
                <h5 class="fw-bold">Animales Disponibles</h5>
                <p class="display-6 text-success mb-1">{{ $stats['available_animals'] ?? 0 }}</p>
                <small class="text-muted">Esperando adopción</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm rounded-4 p-4 h-100 border-0">
                <div class="mb-2"><i class="bi bi-hourglass-split display-6 text-warning"></i></div>
                <h5 class="fw-bold">Solicitudes en Proceso</h5>
                <p class="display-6 text-warning mb-1">{{ $stats['pending_requests'] ?? 0 }}</p>
                <small class="text-muted">Por revisar</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm rounded-4 p-4 h-100 border-0">
                <div class="mb-2"><i class="bi bi-check2-circle display-6 text-secondary"></i></div>
                <h5 class="fw-bold">Adopciones Completadas</h5>
                <p class="display-6 text-secondary mb-1">{{ $stats['completed_adoptions'] ?? 0 }}</p>
                <small class="text-muted">En total</small>
            </div>
        </div>
    </div>

    {{-- Acciones rápidas --}}
    <div class="text-center mt-5">
        <a href="{{ route('superadmin.users.index') }}" class="btn btn-outline-primary btn-lg me-3 shadow-sm">Gestionar Usuarios</a>
        <a href="{{ route('public.animals.index') }}" class="btn btn-outline-success btn-lg shadow-sm">Ver Animales</a>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card h5 {
        font-size: 1.1rem;
    }
    .display-6 {
        font-weight: 700;
    }
    .card {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    }
    .btn-lg {
        transition: transform 0.2s;
    }
    .btn-lg:hover {
        transform: translateY(-2px);
    }
</style>
@endpush
