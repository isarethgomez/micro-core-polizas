@extends('layouts.app')

@section('content')
<div id="contenedor-editar-tercero" class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm tarjeta-formulario">
                <div class="card-header bg-warning text-dark encabezado-tarjeta">
                    <h4 class="mb-0" id="titulo-formulario">Editar Tercero</h4>
                </div>
                <div class="card-body cuerpo-tarjeta">
                    <form action="{{ route('terceros.update', $tercero->id) }}" method="POST" id="formulario-tercero" class="form-tercero">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 grupo-input" id="grupo-cedula">
                            <label for="cedula-tercero" class="form-label etiqueta-input">Cédula de Identidad</label>
                            <input type="text" class="form-control campo-input @error('cedula') is-invalid @enderror" id="cedula-tercero" name="cedula" value="{{ old('cedula', $tercero->cedula) }}" required>
                            @error('cedula')
                                <div class="invalid-feedback error-validacion" id="error-cedula-duplicada">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3 grupo-input" id="grupo-nombre">
                                <label for="nombre-tercero" class="form-label etiqueta-input">Nombre</label>
                                <input type="text" class="form-control campo-input @error('nombre') is-invalid @enderror" id="nombre-tercero" name="nombre" value="{{ old('nombre', $tercero->nombre) }}" required>
                                @error('nombre')
                                    <div class="invalid-feedback error-validacion">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3 grupo-input" id="grupo-apellido">
                                <label for="apellido-tercero" class="form-label etiqueta-input">Apellido</label>
                                <input type="text" class="form-control campo-input @error('apellido') is-invalid @enderror" id="apellido-tercero" name="apellido" value="{{ old('apellido', $tercero->apellido) }}" required>
                                @error('apellido')
                                    <div class="invalid-feedback error-validacion">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3 grupo-input" id="grupo-telefono">
                                <label for="telefono-tercero" class="form-label etiqueta-input">Teléfono</label>
                                <input type="text" class="form-control campo-input @error('telefono') is-invalid @enderror" id="telefono-tercero" name="telefono" value="{{ old('telefono', $tercero->telefono) }}" required>
                                @error('telefono')
                                    <div class="invalid-feedback error-validacion">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3 grupo-input" id="grupo-fecha-nacimiento">
                                <label for="fecha-nacimiento" class="form-label etiqueta-input">Fecha de Nacimiento</label>
                                <input type="date" class="form-control campo-input @error('fecha_nacimiento') is-invalid @enderror" id="fecha-nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $tercero->fecha_nacimiento) }}" required>
                                @error('fecha_nacimiento')
                                    <div class="invalid-feedback error-validacion">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 grupo-input" id="grupo-direccion">
                            <label for="direccion-tercero" class="form-label etiqueta-input">Dirección</label>
                            <textarea class="form-control campo-input @error('direccion') is-invalid @enderror" id="direccion-tercero" name="direccion" rows="3" required>{{ old('direccion', $tercero->direccion) }}</textarea>
                            @error('direccion')
                                <div class="invalid-feedback error-validacion">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 grupo-input" id="grupo-estatus">
                            <label for="estatus-tercero" class="form-label etiqueta-input">Estatus</label>
                            <select class="form-select campo-select @error('estatus') is-invalid @enderror" id="estatus-tercero" name="estatus" required>
                                <option value="activo" {{ old('estatus', $tercero->estatus) == 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ old('estatus', $tercero->estatus) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('estatus')
                                <div class="invalid-feedback error-validacion">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2 grupo-botones">
                            <a href="{{ route('terceros.index') }}" class="btn btn-secondary btn-cancelar" id="btn-cancelar-tercero">Cancelar</a>
                            <button type="submit" class="btn btn-primary btn-guardar" id="btn-actualizar-tercero">Actualizar Tercero</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection