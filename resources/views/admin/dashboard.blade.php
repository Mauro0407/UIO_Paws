@extends('layouts.app')

@section('title', 'Panel de Administración')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 fw-bold">Panel de Administración</h1>
    <p class="lead">Gestiona los animales, refugios, revisa las solicitudes y administra el contenido.</p>

    <div class="row mt-4 g-4">
        @php
            $cards = [
                ['title' => 'Gestionar Animales', 'text' => 'Añadir, editar o eliminar perfiles de animales.', 'route' => route('admin.animals.index'), 'btnClass' => 'btn-primary'],
                ['title' => 'Gestionar Especies', 'text' => 'Añadir o editar especies (ej: Perro, Gato).', 'route' => route('admin.species.index'), 'btnClass' => 'btn-secondary'],
                ['title' => 'Gestionar Razas', 'text' => 'Añadir o editar razas para cada especie.', 'route' => route('admin.breeds.index'), 'btnClass' => 'btn-secondary'],
                ['title' => 'Gestionar Refugios', 'text' => 'Administrar la información de los refugios.', 'route' => route('admin.shelters.index'), 'btnClass' => 'btn-primary'],
                ['title' => 'Revisar Solicitudes', 'text' => 'Ver solicitudes de adopción y voluntariado.', 'route' => '#', 'btnClass' => 'btn-primary'],
            ];
        @endphp

        @foreach($cards as $card)
            <div class="col-md-4">
                <div class="card text-center h-100 shadow-sm rounded-4 border-0">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-bold">{{ $card['title'] }}</h5>
                        <p class="card-text">{{ $card['text'] }}</p>
                        <a href="{{ $card['route'] }}" class="btn {{ $card['btnClass'] }} mt-auto shadow-sm">Ir a {{ explode(' ', $card['title'])[1] }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('styles')
<style>
.card {
    transition: transform .2s ease-in-out, box-shadow .2s ease-in-out;
}
.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 0.75rem 1.5rem rgba(0,0,0,.15)!important;
}
.btn {
    transition: transform .2s ease, box-shadow .2s ease;
}
.btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,.1);
}
</style>
@endpush
