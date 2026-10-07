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
                        <th>Monto Cobertura</th>
                        <th>Prima</th>
                        <th>Estatus</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($planes as $plan)
                        <tr>
                            <td><strong>{{ $plan->nombre }}</strong></td>
                            <td>${{ number_format($plan->monto_cobertura, 2) }}</td>
                            <td>${{ number_format($plan->prima, 2) }}</td>
                            <td>
                                @if ($plan->estatus === 'activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('planes.edit', $plan) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
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