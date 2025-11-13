<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'UIO Paws - Adopción de Animales')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f4f7f6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }
        .card {
            border: none;
            box-shadow: 0 2px 6px rgba(0,0,0,.12), 0 1px 3px rgba(0,0,0,.1);
            border-radius: 1rem;
        }
        .btn-primary {
            background-color: #005A8D;
            border-color: #005A8D;
            transition: transform .2s ease, box-shadow .2s ease, background-color .2s ease;
        }
        .btn-primary:hover {
            background-color: #004B74;
            border-color: #004B74;
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);
        }
        footer {
            background-color: #ffffff;
            box-shadow: 0 -2px 4px rgba(0,0,0,.05);
            margin-top: auto;
        }
    </style>
    @stack('styles')
</head>
<body>

    @include('layouts.partials.navbar')

    <main class="container my-4 my-md-5">
        @include('layouts.partials.messages')
        @yield('content')
    </main>

    <footer class="text-center text-muted py-4 mt-auto">
        <p>&copy; {{ date('Y') }} UIO Paws. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
