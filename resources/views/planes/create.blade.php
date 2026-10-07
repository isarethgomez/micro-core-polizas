@extends('layouts.app')

@section('title', 'Registrar Plan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Registrar Nuevo Plan</h2>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="bi bi-exclamation-triangle"></i> Errores de validación:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('planes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Plan</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="suma-asegurada" class="form-label">Suma Asegurada ($)</label>
                            <input type="number" step="0.01" name="suma-asegurada" id="suma-asegurada" class="form-control" value="{{ old('suma-asegurada') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="costo-mensual" class="form-label">Costo Mensual ($)</label>
                            <input type="number" step="0.01" name="costo-mensual" id="costo-mensual" class="form-control" value="{{ old('costo-mensual') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="estatus" class="form-label">Estatus</label>
                        <select name="estatus" id="estatus" class="form-select" required>
                            <option value="activo" {{ old('estatus') === 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ old('estatus') === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('planes.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection