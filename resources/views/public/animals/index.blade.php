@extends('layouts.app')

@section('title', 'Adopta un Amigo')

@section('content')
<div class="container mt-5">
    {{-- Sección de bienvenida --}}
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Conoce a tus Futuros Amigos</h1>
        <p class="lead text-muted">Cada uno de ellos está esperando una segunda oportunidad y un hogar lleno de amor.</p>
    </div>

    {{-- Mensajes de sesión --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-4 shadow-sm" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    {{-- Lista de animales --}}
    <div class="row g-4">
        @forelse ($animals as $animal)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm animal-card border-0 rounded-4 overflow-hidden">
                    <a href="{{ route('public.animals.show', $animal['id_animal']) }}">
                        @if(!empty($animal['photos']))
                            <img src="{{ asset('storage/' . $animal['photos'][0]['image_url']) }}" class="card-img-top" alt="Foto de {{ $animal['animal_name'] }}">
                        @else
                            <img src="https://via.placeholder.com/300x250.png?text=Sin+Foto" class="card-img-top" alt="Sin foto disponible">
                        @endif
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-truncate" title="{{ $animal['animal_name'] }}">{{ $animal['animal_name'] }}</h5>
                        <p class="card-text text-muted small mb-3">{{ $animal['breed']['breed_name'] }} &bull; {{ $animal['age'] }} años</p>
                        <a href="{{ route('public.animals.show', $animal['id_animal']) }}" class="btn btn-primary mt-auto shadow-sm fw-bold">Ver Detalles</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="fs-5 text-muted">No hay animalitos disponibles para adopción en este momento. ¡Vuelve pronto!</p>
            </div>
        @endforelse
    </div>

    {{-- Paginación --}}
    @if(isset($paginator) && !empty($paginator['links']))
        <div class="d-flex justify-content-center mt-5">
            <nav>
                <ul class="pagination pagination-lg">
                    @foreach ($paginator['links'] as $link)
                        <li class="page-item {{ $link['active'] ? 'active' : '' }} {{ is_null($link['url']) ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $link['url'] }}">{!! $link['label'] !!}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    @endif
</div>
@endsection

@push('styles')
<style>
.animal-card {
    transition: transform .3s ease, box-shadow .3s ease;
}
.animal-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 1rem 2rem rgba(0,0,0,.25)!important;
}
.animal-card img {
    height: 250px;
    object-fit: cover;
    transition: transform .3s ease, filter .3s ease;
}
.animal-card:hover img {
    transform: scale(1.05);
    filter: brightness(1.05);
}
.card-title {
    font-weight: 600;
}
.btn-primary {
    transition: transform .2s ease, box-shadow .2s ease;
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);
}
.page-link {
    border-radius: 50% !important;
}
</style>
@endpush
