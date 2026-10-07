@extends('layouts.app')

@section('content')
<div id="contenedor-terceros" class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 id="titulo-pagina">Gestión de Terceros</h2>
        <a href="{{ route('terceros.create') }}" class="btn btn-primary btn-nuevo-tercero" id="btn-crear-tercero">
            <i class="bi bi-plus-circle"></i> Nuevo Tercero
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
            <table class="table table-striped table-hover tabla-terceros" id="tabla-lista-terceros">
                <thead class="table-dark encabezado-tabla">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cédula</th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">F. Nacimiento</th>
                        <th scope="col">Estatus</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lista_terceros as $tercero_item)
                        <tr class="fila-tercero">
                            <td>{{ $tercero_item->id }}</td>
                            <td>{{ $tercero_item->cedula }}</td>
                            <td>{{ $tercero_item->nombre }} {{ $tercero_item->apellido }}</td>
                            <td>{{ $tercero_item->telefono }}</td>
                            <td>{{ \Carbon\Carbon::parse($tercero_item->fecha_nacimiento)->format('d/m/Y') }}</td>
                            <td>
                                <span class="badge {{ $tercero_item->estatus === 'activo' ? 'bg-success' : 'bg-secondary' }} etiqueta-estatus">
                                    {{ ucfirst($tercero_item->estatus) }}
                                </span>
                            </td>
                            <td class="text-center celda-acciones">
                                <a href="{{ route('terceros.edit', $tercero_item->id) }}" class="btn btn-sm btn-warning btn-editar" id="btn-editar-{{ $tercero_item->id }}">
                                    Editar
                                </a>
                                <form action="{{ route('terceros.destroy', $tercero_item->id) }}" method="POST" class="d-inline formulario-eliminar" id="form-eliminar-{{ $tercero_item->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-eliminar" onclick="return confirm('¿Está seguro de eliminar este tercero?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="fila-vacia">
                            <td colspan="7" class="text-center py-3">No hay terceros registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection