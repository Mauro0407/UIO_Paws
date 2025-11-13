@csrf

{{-- Mostrar errores de validación --}}
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong class="h5">¡Error!</strong> Por favor, corrige los siguientes campos:
        <ul class="mt-2 mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
@endif

{{-- Información General --}}
<div class="card card-body mb-4 shadow-sm rounded-4">
    <h5 class="mb-3">Información del Refugio</h5>
    <div class="row g-3">
        <div class="col-12">
            <label for="shelter_name" class="form-label">Nombre del Refugio</label>
            <input type="text" class="form-control shadow-sm rounded" id="shelter_name" name="shelter_name" value="{{ old('shelter_name', $shelter['shelter_name'] ?? '') }}" required>
        </div>
        <div class="col-md-6">
            <label for="contact_email" class="form-label">Email de Contacto</label>
            <input type="email" class="form-control shadow-sm rounded" id="contact_email" name="contact_email" value="{{ old('contact_email', $shelter['contact_email'] ?? '') }}" required>
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" class="form-control shadow-sm rounded" id="phone" name="phone" value="{{ old('phone', $shelter['phone'] ?? '') }}" required>
        </div>
        <div class="col-12">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control shadow-sm rounded" id="description" name="description" rows="3">{{ old('description', $shelter['description'] ?? '') }}</textarea>
        </div>
    </div>
</div>

{{-- Dirección del Refugio --}}
<div class="card card-body mb-4 shadow-sm rounded-4">
    <h5 class="mb-3">Dirección del Refugio</h5>
    <div class="row g-3">
        <div class="col-12">
            <label for="address_street" class="form-label">Calle y Número</label>
            <input type="text" class="form-control shadow-sm rounded" id="address_street" name="address[street]" value="{{ old('address.street', $shelter['address']['street'] ?? '') }}" required>
        </div>
        <div class="col-md-6">
            <label for="address_city" class="form-label">Ciudad</label>
            <input type="text" class="form-control shadow-sm rounded" id="address_city" name="address[city]" value="{{ old('address.city', $shelter['address']['city'] ?? '') }}" required>
        </div>
        <div class="col-md-6">
            <label for="address_province" class="form-label">Estado / Provincia</label>
            <input type="text" class="form-control shadow-sm rounded" id="address_province" name="address[province]" value="{{ old('address.province', $shelter['address']['province'] ?? '') }}" required>
        </div>
        <div class="col-md-6">
            <label for="address_postal_code" class="form-label">Código Postal</label>
            <input type="text" class="form-control shadow-sm rounded" id="address_postal_code" name="address[postal_code]" value="{{ old('address.postal_code', $shelter['address']['postal_code'] ?? '') }}" required>
        </div>
        <div class="col-md-6">
            <label for="address_country" class="form-label">País</label>
            <input type="text" class="form-control shadow-sm rounded" id="address_country" name="address[country]" value="{{ old('address.country', $shelter['address']['country'] ?? '') }}" required>
        </div>
    </div>
</div>

{{-- Botones --}}
<div class="d-flex justify-content-end gap-2 mt-4">
    <a href="{{ route('admin.shelters.index') }}" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-success">{{ $buttonText }}</button>
</div>
