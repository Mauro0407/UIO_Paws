@extends('layouts.app')

@section('title', 'Mi Panel')

@section('content')
<div class="container mt-5">
    {{-- Saludo --}}
    <div class="text-center mb-5 p-4 bg-light rounded-4 shadow-sm">
        <h1 class="display-4 fw-bold mb-3">Bienvenido a tu panel, {{ Session::get('user_name') }}!</h1>
        <p class="lead text-muted">Desde aquí podrás gestionar tus solicitudes de adopción, voluntariado y donaciones.</p>
    </div>

    {{-- Estadísticas rápidas --}}
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card shadow-sm rounded-4 p-4 text-center h-100 border-0">
                <div class="mb-2"><i class="bi bi-people-fill display-6 text-primary"></i></div>
                <h5 class="fw-bold">Usuarios Registrados</h5>
                <p class="display-6 text-primary mb-1">{{ $stats['users'] ?? 0 }}</p>
                <small class="text-muted">En la plataforma</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm rounded-4 p-4 text-center h-100 border-0">
                <div class="mb-2"><i class="bi bi-heart-fill display-6 text-success"></i></div>
                <h5 class="fw-bold">Animales Disponibles</h5>
                <p class="display-6 text-success mb-1">{{ $stats['available_animals'] ?? 0 }}</p>
                <small class="text-muted">Esperando adopción</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm rounded-4 p-4 text-center h-100 border-0">
                <div class="mb-2"><i class="bi bi-hourglass-split display-6 text-warning"></i></div>
                <h5 class="fw-bold">Solicitudes Pendientes</h5>
                <p class="display-6 text-warning mb-1">{{ $stats['pending_requests'] ?? 0 }}</p>
                <small class="text-muted">Por revisar</small>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm rounded-4 p-4 text-center h-100 border-0">
                <div class="mb-2"><i class="bi bi-check2-circle display-6 text-secondary"></i></div>
                <h5 class="fw-bold">Adopciones Completadas</h5>
                <p class="display-6 text-secondary mb-1">{{ $stats['completed_adoptions'] ?? 0 }}</p>
                <small class="text-muted">En total</small>
            </div>
        </div>
    </div>

    {{-- Acciones principales --}}
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm rounded-4 h-100 border-0 hover-card">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title fw-bold">Gestionar Usuarios</h5>
                    <p class="card-text text-muted">Crea, edita o elimina usuarios de la plataforma.</p>
                    <a href="{{ route('superadmin.users.index') }}" class="btn btn-primary mt-3 shadow-sm fw-bold">Ir a Usuarios</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm rounded-4 h-100 border-0 hover-card">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h5 class="card-title fw-bold">Gestionar Animales</h5>
                    <p class="card-text text-muted">Añade, edita o elimina perfiles de animales disponibles.</p>
                    <a href="{{ route('public.animals.index') }}" class="btn btn-success mt-3 shadow-sm fw-bold">Ir a Animales</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .display-6 {
        font-weight: 700;
    }
    .card h5 {
        font-size: 1.1rem;
    }
    /* Hover para tarjetas */
    .hover-card {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    }
    .btn-lg, .btn {
        transition: transform 0.2s;
    }
    .btn:hover {
        transform: translateY(-2px);
    }
</style>
@endpush
