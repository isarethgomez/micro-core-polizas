<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tercero</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5" style="max-width: 700px;">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h2 class="h5 mb-0">Editar Tercero: {{ $tercero->nombres }} {{ $tercero->apellidos }}</h2>
            </div>
            <div class="card-body">
                @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="bi bi-exclamation-triangle"></i> ¡Atención! No se pudo guardar el registro:</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
                <form action="{{ route('terceros.update', $tercero) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Tipo Doc.</label>
                            <select name="tipo_documento" class="form-select" required>
                                <option value="V" {{ old('tipo_documento', $tercero->tipo_documento) === 'V' ? 'selected' : '' }}>V - Venezolano</option>
                                <option value="E" {{ old('tipo_documento', $tercero->tipo_documento) === 'E' ? 'selected' : '' }}>E - Extranjero</option>
                                <option value="J" {{ old('tipo_documento', $tercero->tipo_documento) === 'J' ? 'selected' : '' }}>J - Jurídico</option>
                                <option value="G" {{ old('tipo_documento', $tercero->tipo_documento) === 'G' ? 'selected' : '' }}>G - Gubernamental</option>
                                <option value="P" {{ old('tipo_documento', $tercero->tipo_documento) === 'P' ? 'selected' : '' }}>P - Pasaporte</option>
                            </select>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label class="form-label">Número de Documento</label>
                            <input type="text" name="numero_documento" class="form-control" value="{{ old('numero_documento', $tercero->numero_documento) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nombres</label>
                            <input type="text" name="nombres" class="form-control" value="{{ old('nombres', $tercero->nombres) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos', $tercero->apellidos) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $tercero->telefono) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $tercero->email) }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Dirección</label>
                        <textarea name="direccion" class="form-control" rows="2">{{ old('direccion', $tercero->direccion) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Estatus</label>
                        <select name="estatus" class="form-select" required>
                            <option value="activo" {{ old('estatus', $tercero->estatus) === 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ old('estatus', $tercero->estatus) === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('terceros.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning">Actualizar Tercero</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>