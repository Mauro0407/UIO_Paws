@extends('layouts.app')

@section('title', 'Editar Refugio')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-white border-0">
            <h1 class="h3 mb-0 fw-bold">Editar Refugio: {{ $shelter['shelter_name'] }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.shelters.update', $shelter['id_shelter']) }}" method="POST">
                @csrf
                @method('PUT')
                @include('admin.shelters.form', ['shelter' => $shelter, 'buttonText' => 'Actualizar Refugio'])
            </form>
        </div>
    </div>
</div>
@endsection
