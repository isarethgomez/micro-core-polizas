@extends('layouts.app')

@section('title', 'Editar Tercero')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h2 class="h5 mb-0">Editar Tercero: {{ $tercero->nombre }} {{ $tercero->apellido }}</h2>
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

                <form action="{{ route('terceros.update', $tercero) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cedula" class="form-label">Cédula de Identidad</label>
                            <input type="text" name="cedula" id="cedula" class="form-control" value="{{ old('cedula', $tercero->cedula) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fecha-nacimiento" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" name="fecha-nacimiento" id="fecha-nacimiento" class="form-control" value="{{ old('fecha-nacimiento', $tercero->fecha_nacimiento) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $tercero->nombre) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ old('apellido', $tercero->apellido) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono', $tercero->telefono) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="estatus" class="form-label">Estatus</label>
                            <select name="estatus" id="estatus" class="form-select" required>
                                <option value="activo" {{ old('estatus', $tercero->estatus) === 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ old('estatus', $tercero->estatus) === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <textarea name="direccion" id="direccion" class="form-control" rows="3" required>{{ old('direccion', $tercero->direccion) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('terceros.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-warning">Actualizar Tercero</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection