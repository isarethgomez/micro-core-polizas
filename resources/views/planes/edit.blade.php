@extends('layouts.app')

@section('content')
<div id="contenedor-editar-plan" class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm tarjeta-formulario">
                <div class="card-header bg-warning text-dark encabezado-tarjeta">
                    <h4 class="mb-0" id="titulo-formulario">Editar Plan</h4>
                </div>
                <div class="card-body cuerpo-tarjeta">
                    <form action="{{ route('planes.update', $plan) }}" method="POST" id="formulario-plan" class="form-plan">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 grupo-input" id="grupo-nombre">
                            <label for="nombre-plan" class="form-label etiqueta-input">Nombre del Plan</label>
                            <input type="text" class="form-control campo-input @error('nombre') is-invalid @enderror" id="nombre-plan" name="nombre" value="{{ old('nombre', $plan->nombre) }}" required>
                            @error('nombre')
                                <div class="invalid-feedback error-validacion">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 grupo-input" id="grupo-suma-asegurada">
                            <label for="suma-asegurada" class="form-label etiqueta-input">Suma Asegurada ($)</label>
                            <input type="number" step="0.01" class="form-control campo-input @error('suma_asegurada') is-invalid @enderror" id="suma-asegurada" name="suma_asegurada" value="{{ old('suma_asegurada', $plan->suma_asegurada) }}" required>
                            @error('suma_asegurada')
                                <div class="invalid-feedback error-validacion">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 grupo-input" id="grupo-costo-mensual">
                            <label for="costo-mensual" class="form-label etiqueta-input">Costo Mensual ($)</label>
                            <input type="number" step="0.01" class="form-control campo-input @error('costo_mensual') is-invalid @enderror" id="costo-mensual" name="costo_mensual" value="{{ old('costo_mensual', $plan->costo_mensual) }}" required>
                            @error('costo_mensual')
                                <div class="invalid-feedback error-validacion">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 grupo-input" id="grupo-estatus">
                            <label for="estatus-plan" class="form-label etiqueta-input">Estatus</label>
                            <select class="form-select campo-select @error('estatus') is-invalid @enderror" id="estatus-plan" name="estatus" required>
                                <option value="activo" {{ old('estatus', $plan->estatus) == 'activo' ? 'selected' : '' }}>Activo</option>
                                <option value="inactivo" {{ old('estatus', $plan->estatus) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                            </select>
                            @error('estatus')
                                <div class="invalid-feedback error-validacion">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2 grupo-botones">
                            <a href="{{ route('planes.index') }}" class="btn btn-secondary btn-cancelar" id="btn-cancelar-plan">Cancelar</a>
                            <button type="submit" class="btn btn-primary btn-guardar" id="btn-actualizar-plan">Actualizar Plan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection