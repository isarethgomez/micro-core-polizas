@extends('layouts.app')

@section('content')
<div id="contenedor-crear-poliza" class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm tarjeta-formulario">
                <div class="card-header bg-primary text-white encabezado-tarjeta">
                    <h4 class="mb-0" id="titulo-formulario">Emitir Nueva Póliza</h4>
                </div>
                <div class="card-body cuerpo-tarjeta">
                    <form action="{{ route('polizas.store') }}" method="POST" id="formulario-poliza" class="form-poliza">
                        @csrf

                        <div class="mb-3 grupo-input" id="grupo-tercero">
                            <label for="tercero-id" class="form-label etiqueta-input">Seleccionar Tercero</label>
                            <select class="form-select campo-select @error('tercero_id') is-invalid @enderror" id="tercero-id" name="tercero_id" required>
                                <option value="" disabled selected>-- Seleccione un Tercero --</option>
                                @foreach($terceros_activos as $tercero_item)
                                    <option value="{{ $tercero_item->id }}" {{ old('tercero_id') == $tercero_item->id ? 'selected' : '' }}>
                                        {{ $tercero_item->cedula }} - {{ $tercero_item->nombre }} {{ $tercero_item->apellido }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tercero_id')
                                <div class="invalid-feedback error-validacion">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 grupo-input" id="grupo-plan">
                            <label for="plan-id" class="form-label etiqueta-input">Seleccionar Plan</label>
                            <select class="form-select campo-select @error('plan_id') is-invalid @enderror" id="plan-id" name="plan_id" required>
                                <option value="" disabled selected>-- Seleccione un Plan --</option>
                                @foreach($planes_activos as $plan_item)
                                    <option value="{{ $plan_item->id }}" {{ old('plan_id') == $plan_item->id ? 'selected' : '' }}>
                                        {{ $plan_item->nombre }} (Suma: ${{ number_format($plan_item->suma_asegurada, 2) }})
                                    </option>
                                @endforeach
                            </select>
                            @error('plan_id')
                                <div class="invalid-feedback error-validacion">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3 grupo-input" id="grupo-fecha-inicio">
                                <label for="fecha-inicio" class="form-label etiqueta-input">Fecha de Inicio</label>
                                <input type="date" class="form-control campo-input @error('fecha_inicio') is-invalid @enderror" id="fecha-inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}" required>
                                @error('fecha_inicio')
                                    <div class="invalid-feedback error-validacion">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3 grupo-input" id="grupo-fecha-final">
                                <label for="fecha-final" class="form-label etiqueta-input">Fecha Final</label>
                                <input type="date" class="form-control campo-input @error('fecha_final') is-invalid @enderror" id="fecha-final" name="fecha_final" value="{{ old('fecha_final') }}" required>
                                @error('fecha_final')
                                    <div class="invalid-feedback error-validacion">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 grupo-input" id="grupo-estatus">
                            <label for="estatus-poliza" class="form-label etiqueta-input">Estatus</label>
                            <select class="form-select campo-select @error('estatus') is-invalid @enderror" id="estatus-poliza" name="estatus" required>
                                <option value="activa" {{ old('estatus') == 'activa' ? 'selected' : '' }}>Activa</option>
                                <option value="inactiva" {{ old('estatus') == 'inactiva' ? 'selected' : '' }}>Inactiva</option>
                            </select>
                            @error('estatus')
                                <div class="invalid-feedback error-validacion">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end gap-2 grupo-botones">
                            <a href="{{ route('polizas.index') }}" class="btn btn-secondary btn-cancelar" id="btn-cancelar-poliza">Cancelar</a>
                            <button type="submit" class="btn btn-success btn-guardar" id="btn-guardar-poliza">Guardar Póliza</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection