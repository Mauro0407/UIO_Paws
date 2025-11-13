@if ($errors->any())
<div class="alert alert-danger rounded-4 shadow-sm">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row g-3">
    <div class="col-md-6">
        <label for="first_name" class="form-label fw-bold">Nombre</label>
        <input type="text" class="form-control rounded-pill" id="first_name" name="first_name" value="{{ old('first_name', $user['first_name'] ?? '') }}" required>
    </div>
    <div class="col-md-6">
        <label for="last_name" class="form-label fw-bold">Apellido</label>
        <input type="text" class="form-control rounded-pill" id="last_name" name="last_name" value="{{ old('last_name', $user['last_name'] ?? '') }}" required>
    </div>
</div>

<div class="mb-3 mt-3">
    <label for="email" class="form-label fw-bold">Correo Electrónico</label>
    <input type="email" class="form-control rounded-pill" id="email" name="email" value="{{ old('email', $user['email'] ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="role" class="form-label fw-bold">Rol</label>
    <select name="role" id="role" class="form-select rounded-pill" required>
        <option value="User" {{ old('role', $user['role'] ?? '') == 'User' ? 'selected' : '' }}>Usuario</option>
        <option value="Admin" {{ old('role', $user['role'] ?? '') == 'Admin' ? 'selected' : '' }}>Administrador</option>
        <option value="Super Admin" {{ old('role', $user['role'] ?? '') == 'Super Admin' ? 'selected' : '' }}>Super Administrador</option>
    </select>
</div>

@if (!$user)
<div class="row g-3">
    <div class="col-md-6">
        <label for="password" class="form-label fw-bold">Contraseña</label>
        <input type="password" class="form-control rounded-pill" id="password" name="password" required>
    </div>
    <div class="col-md-6">
        <label for="password_confirmation" class="form-label fw-bold">Confirmar Contraseña</label>
        <input type="password" class="form-control rounded-pill" id="password_confirmation" name="password_confirmation" required>
    </div>
</div>
<small class="form-text text-muted">La contraseña debe tener al menos 8 caracteres.</small>
@endif

<div class="mt-4 text-center">
    <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm fw-bold">
        {{ $user ? 'Actualizar Usuario' : 'Crear Usuario' }}
    </button>
</div>

@push('styles')
<style>
    .form-control, .form-select {
        box-shadow: inset 0 0.125rem 0.25rem rgba(0,0,0,0.075);
    }
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
    }
</style>
@endpush
