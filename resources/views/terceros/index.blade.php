@extends('layouts.app')

@section('title', 'Listado de Terceros')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
        <h1 class="h4 mb-0 fw-bold">Gestión de Terceros</h1>
        <a href="{{ route('terceros.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus-fill"></i> Registrar Tercero
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
                        <th>Documento</th>
                        <th>Nombre Completo</th>
                        <th>Teléfono</th>
                        <th>Correo Electrónico</th>
                        <th>Estatus</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($terceros as $tercero)
                        <tr>
                            <td>
                                <span class="badge bg-secondary me-1">{{ $tercero->tipo_documento }}</span>
                                {{ $tercero->numero_documento }}
                            </td>
                            <td>{{ $tercero->nombres }} {{ $tercero->apellidos }}</td>
                            <td>{{ $tercero->telefono }}</td>
                            <td>{{ $tercero->email }}</td>
                            <td>
                                @if ($tercero->estatus === 'activo')
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('terceros.edit', $tercero) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                No hay terceros registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection