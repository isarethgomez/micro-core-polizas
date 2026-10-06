<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Módulo de Planes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="contenedor-principal" class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Gestión de Planes</h1>
            <a href="{{ route('planes.create') }}" id="btn-crear-plan" class="btn btn-primary">Nuevo Plan</a>
        </div>

        @if (session('exito'))
            <div id="alerta-exito" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('exito') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table id="tabla-planes" class="table table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Suma Asegurada</th>
                            <th>Costo Mensual</th>
                            <th>Estatus</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($planes as $plan)
                            <tr>
                                <td>{{ $plan->id }}</td>
                                <td>{{ $plan->nombre }}</td>
                                <td>${{ number_format($plan->suma_asegurada, 2) }}</td>
                                <td>${{ number_format($plan->costo_mensual, 2) }}</td>
                                <td>
                                    <span class="badge {{ $plan->estatus === 'activo' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($plan->estatus) }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('planes.edit', $plan->id) }}" id="btn-editar-{{ $plan->id }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('planes.destroy', $plan->id) }}" method="POST" class="d-inline" id="form-eliminar-{{ $plan->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Deseas eliminar este plan?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No hay planes registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>