@extends('layouts.app')

@section('content')
<div id="contenedor-planes" class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 id="titulo-pagina">Gestión de Planes</h2>
        <a href="{{ route('planes.create') }}" class="btn btn-primary btn-nuevo-plan" id="btn-crear-plan">
            <i class="bi bi-plus-circle"></i> Nuevo Plan
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mensaje-exito" role="alert" id="alerta-exito">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm tarjeta-tabla">
        <div class="card-body">
            <table class="table table-striped table-hover tabla-planes" id="tabla-lista-planes">
                <thead class="table-dark encabezado-tabla">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Suma Asegurada</th>
                        <th scope="col">Costo Mensual</th>
                        <th scope="col">Estatus</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lista_planes as $plan_item)
                        <tr class="fila-plan">
                            <td>{{ $plan_item->id }}</td>
                            <td>{{ $plan_item->nombre }}</td>
                            <td>${{ number_format($plan_item->suma_asegurada, 2) }}</td>
                            <td>${{ number_format($plan_item->costo_mensual, 2) }}</td>
                            <td>
                                <span class="badge {{ $plan_item->estatus === 'activo' ? 'bg-success' : 'bg-secondary' }} etiqueta-estatus">
                                    {{ ucfirst($plan_item->estatus) }}
                                </span>
                            </td>
                            <td class="text-center celda-acciones">
                                <a href="{{ route('planes.edit', $plan_item->id) }}" class="btn btn-sm btn-warning btn-editar" id="btn-editar-{{ $plan_item->id }}">
                                    Editar
                                </a>
                                <form action="{{ route('planes.destroy', $plan_item->id) }}" method="POST" class="d-inline formulario-eliminar" id="form-eliminar-{{ $plan_item->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-eliminar" onclick="return confirm('¿Está seguro de eliminar este plan?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="fila-vacia">
                            <td colspan="6" class="text-center py-3">No hay planes registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection