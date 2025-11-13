@extends('layouts.app')

@section('title', 'Añadir Refugio')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm rounded-4">
        <div class="card-header bg-white border-0">
            <h1 class="h3 mb-0 fw-bold">Añadir Nuevo Refugio</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.shelters.store') }}" method="POST">
                @csrf
                @include('admin.shelters.form', ['buttonText' => 'Crear Refugio'])
            </form>
        </div>
    </div>
</div>
@endsection
