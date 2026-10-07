@extends('layouts.app')

@section('title', 'Registrar Tercero')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="h5 mb-0">Registrar Nuevo Tercero</h2>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong><i class="bi bi-exclamation-triangle"></i> ¡Atención! Ocurrieron errores de validación:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('terceros.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="tipo-documento" class="form-label">Tipo Doc.</label>
                            <select name="tipo-documento" id="tipo-documento" class="form-select" required>
                                <option value="V" {{ old('tipo-documento') === 'V' ? 'selected' : '' }}>V - Venezolano</option>
                                <option value="E" {{ old('tipo-documento') === 'E' ? 'selected' : '' }}>E - Extranjero</option>
                                <option value="J" {{ old('tipo-documento') === 'J' ? 'selected' : '' }}>J - Jurídico</option>
                                <option value="G" {{ old('tipo-documento') === 'G' ? 'selected' : '' }}>G - Gubernamental</option>
                                <option value="P" {{ old('tipo-documento') === 'P' ? 'selected' : '' }}>P - Pasaporte</option>
                            </select>
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="numero-documento" class="form-label">Número de Documento</label>
                            <input type="text" name="numero-documento" id="numero-documento" class="form-control" value="{{ old('numero-documento') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombres" class="form-label">Nombres</label>
                            <input type="text" name="nombres" id="nombres" class="form-control" value="{{ old('nombres') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ old('apellidos') }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <textarea name="direccion" id="direccion" class="form-control" rows="2">{{ old('direccion') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="estatus" class="form-label">Estatus</label>
                        <select name="estatus" id="estatus" class="form-select" required>
                            <option value="activo" {{ old('estatus') === 'activo' ? 'selected' : '' }}>Activo</option>
                            <option value="inactivo" {{ old('estatus') === 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('terceros.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar Tercero</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection