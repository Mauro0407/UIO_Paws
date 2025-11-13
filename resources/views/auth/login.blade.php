@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm rounded-4 border-0">
            <div class="card-header text-center bg-white border-0 pt-4">
                <h4 class="card-title fw-bold">Iniciar Sesión</h4>
            </div>
            <div class="card-body px-5 pb-5">
                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror rounded-3" id="email" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">Contraseña</label>
                        <input type="password" class="form-control rounded-3" id="password" name="password" required>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm fw-bold">Entrar</button>
                    </div>

                    <div class="text-center">
                        <small class="text-muted">¿No tienes una cuenta?
                            <a href="{{ route('register.form') }}" class="text-decoration-none fw-semibold">Regístrate aquí</a>
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .card {
        transition: transform .2s ease-in-out, box-shadow .2s ease-in-out;
    }
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 0.75rem 1.5rem rgba(0,0,0,.15)!important;
    }
    .btn-lg {
        transition: transform .2s ease, box-shadow .2s ease;
    }
    .btn-lg:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);
    }
</style>
@endpush
@endsection
