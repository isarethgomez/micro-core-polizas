<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Emisión de Pólizas</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Barra de Navegación Principal -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm" id="barra-navegacion">
        <div class="container" id="contenedor-navbar">
            <a class="navbar-brand fw-bold" href="{{ route('planes.index') }}" id="brand-logo">
                Emisión de Pólizas
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu-navegacion" aria-controls="menu-navegacion" aria-expanded="false" aria-label="Toggle navigation" id="btn-menu-responsive">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu-navegacion">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="lista-enlaces-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('planes.*') ? 'active' : '' }}" href="{{ route('planes.index') }}" id="nav-link-planes">
                            Planes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('terceros.*') ? 'active' : '' }}" href="{{ route('terceros.index') }}" id="nav-link-terceros">
                            Terceros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('polizas.*') ? 'active' : '' }}" href="{{ route('polizas.index') }}" id="nav-link-polizas">
                            Pólizas
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="py-4" id="contenido-principal">
        @yield('content')
    </main>

    <!-- Pie de Página -->
    <footer class="text-center py-3 text-muted mt-auto" id="pie-pagina">
        <small>&copy; {{ date('Y') }} Sistema de Emisión de Pólizas. Todos los derechos reservados.</small>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>