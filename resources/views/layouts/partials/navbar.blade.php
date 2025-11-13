<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="{{ route('home') }}">🐾 UIO Paws</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('public.animals.index') ? 'active fw-bold' : '' }}" href="{{ route('public.animals.index') }}">Ver Animales</a>
                </li>

                @if(Session::has('api_token'))
                    {{-- Usuario logueado --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ¡Hola, {{ Session::get('user_name', 'Usuario') }}!
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow rounded-4" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Mi Panel</a></li>

                            @if(in_array(Session::get('user_role'), ['Admin', 'Super Admin']))
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Panel Admin</a></li>
                            @endif

                            @if(Session::get('user_role') === 'Super Admin')
                                <li><a class="dropdown-item" href="{{ route('superadmin.dashboard') }}">Panel Super Admin</a></li>
                            @endif

                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item fw-bold text-danger">Cerrar Sesión</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    {{-- Invitado --}}
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary ms-2 rounded-4 shadow-sm fw-bold" href="{{ route('register.form') }}">Registrarse</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@push('styles')
<style>
.navbar-nav .nav-link:hover {
    color: #0d6efd !important;
    text-decoration: underline;
}
.dropdown-menu .dropdown-item:hover {
    background-color: #f8f9fa;
    color: #0d6efd;
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);
}
</style>
@endpush
