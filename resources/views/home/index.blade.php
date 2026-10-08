<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - Micro-Core de Emisión de Pólizas</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Micro-Core Pólizas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu-navegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu-navegacion">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('planes.index') }}">Planes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('terceros.index') }}">Terceros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('polizas.index') }}">Pólizas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container py-5" id="contenedor-bienvenida">
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-primary mb-3">Bienvenido al Micro-Core de Emisión de Pólizas</h1>
            <p class="lead text-secondary">
                Sistema de gestión integral para la administración de planes, clientes terceros y emisión de pólizas.
            </p>
        </div>

        <!-- Tarjetas / Botones de Módulos -->
        <div class="row g-4 justify-content-center">
            
            <!-- Módulo Planes -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0" id="tarjeta-planes">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <span class="fs-1 text-primary">📋</span>
                        </div>
                        <h3 class="card-title h4 mb-3">Gestión de Planes</h3>
                        <p class="card-text text-muted mb-4">
                            Administra la oferta de cobertura, montos asegurados y costos mensuales.
                        </p>
                        <a href="{{ route('planes.index') }}" class="btn btn-outline-primary btn-lg w-100 btn-modulo">
                            Ir a Planes
                        </a>
                    </div>
                </div>
            </div>

            <!-- Módulo Terceros -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0" id="tarjeta-terceros">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <span class="fs-1 text-success">👥</span>
                        </div>
                        <h3 class="card-title h4 mb-3">Gestión de Terceros</h3>
                        <p class="card-text text-muted mb-4">
                            Registra y gestiona los datos personales de clientes y titulares.
                        </p>
                        <a href="{{ route('terceros.index') }}" class="btn btn-outline-success btn-lg w-100 btn-modulo">
                            Ir a Terceros
                        </a>
                    </div>
                </div>
            </div>

            <!-- Módulo Pólizas -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0" id="tarjeta-polizas">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <span class="fs-1 text-warning">🎟️</span>
                        </div>
                        <h3 class="card-title h4 mb-3">Emisión de Pólizas</h3>
                        <p class="card-text text-muted mb-4">
                            Asigna planes activos a los terceros registrados y gestiona sus fechas de vigencia.
                        </p>
                        <a href="{{ route('polizas.index') }}" class="btn btn-outline-warning btn-lg w-100 btn-modulo">
                            Ir a Pólizas
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>