<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Plan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div id="contenedor-formulario-editar" class="container mt-5" style="max-width: 600px;">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h2 class="h5 mb-0">Editar Plan: {{ $plan->nombre }}</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('planes.update', $plan->id) }}" method="POST" id="formulario-editar-plan">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Plan</label>
                        <input type="text" name="nombre" id="nombre-plan" class="form-control" value="{{ $plan->nombre }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="suma_asegurada" class="form-label">Suma Asegurada ($)</label>
                        <input type="number" step="0.01" name="suma_asegurada" id="suma-asegurada" class="form-control" value="{{ $plan->suma_asegurada }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="costo_mensual" class="form-label">Costo Mensual ($)</label>
                        <input type="number" step="0.01" name="costo_mensual" id="costo-mensual" class="form-control" value="{{ $plan->costo_mensual }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="estatus" class="form-label">Estatus</label>
                        <select name="estatus" id="estatus-plan" class="form-select" required>
                            <option value="activo" {{ $plan->estatus === 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ $plan->estatus === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('planes.index') }}" id="btn-cancelar" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" id="btn-actualizar-plan" class="btn btn-warning">Actualizar Plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>