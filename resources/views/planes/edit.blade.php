@extends('layouts.app')

@section('title', 'Editar Plan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h2 class="h5 mb-0">Editar Plan: {{ $plan->nombre }}</h2>
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

                <form action="{{ route('planes.update', $plan) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Plan</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $plan->nombre) }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="monto-cobertura" class="form-label">Monto de Cobertura ($)</label>
                            <input type="number" step="0.01" name="monto-cobertura" id="monto-cobertura" class="form-control" value="{{ old('monto-cobertura', $plan->monto_cobertura) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="prima" class="form-label">Prima ($)</label>
                            <input type="number" step="0.01" name="prima" id="prima" class="form-control" value="{{ old('prima', $plan->prima) }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="estatus" class="form-label">Estatus</label>
                        <select name="estatus" id="estatus" class="form-select" required>
                            <option value="activo" {{ old('estatus', $plan->estatus) === 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ old('estatus', $plan->estatus) === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('planes.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning">Actualizar Plan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection