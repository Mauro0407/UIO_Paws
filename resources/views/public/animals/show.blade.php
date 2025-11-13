@extends('layouts.app')

@section('title', 'Conoce a ' . $animal['animal_name'])

@section('content')
<div class="container mt-5">
    <div class="row g-4">
        {{-- Columna de Fotos --}}
        <div class="col-md-7">
            @if(isset($animal['photos']) && count($animal['photos']) > 0)
                <div class="mb-3 rounded overflow-hidden shadow-sm animal-main-photo">
                    <img src="{{ asset('storage/' . $animal['photos'][0]['image_url']) }}" class="img-fluid w-100" style="height: 400px; object-fit: cover;" alt="Foto principal de {{ $animal['animal_name'] }}">
                </div>

                {{-- Galería de fotos adicionales --}}
                @if(count($animal['photos']) > 1)
                    <div class="row g-2">
                        @foreach(array_slice($animal['photos'], 1) as $photo)
                            <div class="col-4">
                                <a href="{{ asset('storage/' . $photo['image_url']) }}" data-lightbox="gallery">
                                    <img src="{{ asset('storage/' . $photo['image_url']) }}" class="img-fluid rounded shadow-sm animal-gallery-photo" style="height: 120px; object-fit: cover;" alt="Foto de {{ $animal['animal_name'] }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            @else
                <div class="text-center p-5 border rounded bg-light shadow-sm">
                    <p class="fs-5 text-muted">Este animalito aún no tiene foto.</p>
                </div>
            @endif
        </div>

        {{-- Columna de Información --}}
        <div class="col-md-5">
            <div class="card shadow-sm rounded-4 border-0">
                <div class="card-body">
                    <h1 class="card-title fw-bold mb-3">{{ $animal['animal_name'] }}</h1>

                    {{-- Estado de Adopción --}}
                    @php
                        $statusBadge = [
                            'Disponible' => 'bg-success',
                            'En proceso' => 'bg-warning text-dark',
                            'Adoptado' => 'bg-secondary'
                        ][$animal['status']] ?? 'bg-secondary';
                    @endphp
                    <span class="badge {{ $statusBadge }} fs-6 mb-3">{{ $animal['status'] }}</span>

                    <p class="card-text mb-3">{{ $animal['description'] }}</p>

                    <ul class="list-group list-group-flush mb-3 rounded-3 overflow-hidden shadow-sm">
                        <li class="list-group-item"><b>Edad:</b> {{ $animal['age'] }} años</li>
                        <li class="list-group-item"><b>Sexo:</b> {{ $animal['sex'] }}</li>
                        <li class="list-group-item"><b>Tamaño:</b> {{ $animal['size'] }}</li>
                        <li class="list-group-item"><b>Raza:</b> {{ $animal['breed']['breed_name'] }} ({{ $animal['breed']['species']['species_name'] }})</li>
                        <li class="list-group-item"><b>Refugio:</b> {{ $animal['shelter']['shelter_name'] }}</li>
                        <li class="list-group-item"><b>Esterilizado:</b> {{ $animal['is_sterilized'] ? 'Sí' : 'No' }}</li>
                    </ul>

                    @if($animal['status'] == 'Disponible')
                        <a href="#" class="btn btn-primary w-100 shadow-sm fw-bold btn-lg mt-2">¡Adóptame!</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Historial Médico --}}
    <div class="row mt-5">
        <div class="col-12">
            <h3 class="mb-3">Historial Médico</h3>
            @if(count($animal['medical_records']) > 0)
                <div class="accordion shadow-sm rounded-4 overflow-hidden" id="medicalHistory">
                    @foreach($animal['medical_records'] as $index => $record)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="false" aria-controls="collapse{{ $index }}">
                                    <strong>{{ \Carbon\Carbon::parse($record['event_date'])->format('d/m/Y') }}</strong>: {{ $record['event_type'] }}
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $index }}" data-bs-parent="#medicalHistory">
                                <div class="accordion-body">
                                    {{ $record['description'] }}
                                    @if($record['veterinarian_name'])
                                        <br><small class="text-muted">Atendido por: {{ $record['veterinarian_name'] }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-muted">No hay registros médicos disponibles para este animal.</p>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.animal-main-photo, .animal-gallery-photo {
    transition: transform .3s ease, filter .3s ease;
}
.animal-main-photo:hover, .animal-gallery-photo:hover {
    transform: scale(1.03);
    filter: brightness(1.05);
}
.accordion-button {
    font-weight: 500;
}
.accordion-button:focus {
    box-shadow: none;
}
.card-title {
    font-size: 2rem;
}
.badge {
    padding: 0.6em 1em;
    font-size: 0.9rem;
}
.btn-primary {
    transition: transform .2s ease, box-shadow .2s ease;
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);
}
</style>
@endpush
