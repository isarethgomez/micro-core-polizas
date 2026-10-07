@extends('layouts.app')

@section('title', 'Listado de Planes')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h1 class="h4 mb-0 fw-bold">Gestión de Planes</h1>
        <a href="{{ route('planes.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle-fill"></i> Registrar Plan
        </a>
    </div>

    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre del Plan</th>
                        <th>Suma Asegurada</th>
                        <th>Costo Mensual</th>
                        <th>Estatus</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($planes as $plan)
                        <tr>
                            <td><strong>{{ $plan->nombre }}</strong></td>
                            <td>${{ number_format($plan->suma_asegurada, 2) }}</td>
                            <td>${{ number_format($plan->costo_mensual, 2) }}</td>
                            <td>
                                @if ($plan->estatus === 'activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('planes.edit', $plan) }}" class="btn btn-sm btn-outline-warning me-1">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>

                                <form action="{{ route('planes.destroy', $plan) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este plan?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                No hay planes registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection