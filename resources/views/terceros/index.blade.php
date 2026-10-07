<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Terceros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Módulo de Terceros (Clientes)</h2>
            <div>
                <a href="{{ route('planes.index') }}" class="btn btn-outline-secondary me-2">Ver Planes</a>
                <a href="{{ route('terceros.create') }}" class="btn btn-primary">Nuevo Tercero</a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Documento</th>
                            <th>Nombre Completo</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Estatus</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($terceros as $tercero)
                            <tr>
                                <td><strong>{{ $tercero->tipo_documento }}-{{ $tercero->numero_documento }}</strong></td>
                                <td>{{ $tercero->nombres }} {{ $tercero->apellidos }}</td>
                                <td>{{ $tercero->telefono }}</td>
                                <td>{{ $tercero->email }}</td>
                                <td>
                                    <span class="badge {{ $tercero->estatus === 'activo' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($tercero->estatus) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('terceros.edit', $tercero) }}" class="btn btn-sm btn-warning">Editar</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No hay terceros registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>