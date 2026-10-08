@extends('layouts.app')

@section('content')
<div id="contenedor-polizas" class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 id="titulo-pagina">Gestión de Pólizas</h2>
        <a href="{{ route('polizas.create') }}" class="btn btn-primary btn-nueva-poliza" id="btn-crear-poliza">
            <i class="bi bi-plus-circle"></i> Emitir Póliza
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
            <table class="table table-striped table-hover tabla-polizas" id="tabla-lista-polizas">
                <thead class="table-dark encabezado-tabla">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Tercero</th>
                        <th scope="col">Plan</th>
                        <th scope="col">Fecha Inicio</th>
                        <th scope="col">Fecha Final</th>
                        <th scope="col">Estatus</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lista_polizas as $poliza_item)
                        <tr class="fila-poliza">
                            <td>{{ $poliza_item->id }}</td>
                            <td>{{ $poliza_item->tercero->nombre }} {{ $poliza_item->tercero->apellido }} ({{ $poliza_item->tercero->cedula }})</td>
                            <td>{{ $poliza_item->plan->nombre }}</td>
                            <td>{{ \Carbon\Carbon::parse($poliza_item->fecha_inicio)->format('d/m/Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($poliza_item->fecha_final)->format('d/m/Y') }}</td>
                            <td>
                                <span class="badge {{ $poliza_item->estatus === 'activa' ? 'bg-success' : 'bg-secondary' }} etiqueta-estatus">
                                    {{ ucfirst($poliza_item->estatus) }}
                                </span>
                            </td>
                            <td class="text-center celda-acciones">
                                <a href="{{ route('polizas.edit', $poliza_item->id) }}" class="btn btn-sm btn-warning btn-editar" id="btn-editar-{{ $poliza_item->id }}">
                                    Editar
                                </a>
                                <form action="{{ route('polizas.destroy', $poliza_item->id) }}" method="POST" class="d-inline formulario-eliminar" id="form-eliminar-{{ $poliza_item->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-eliminar" onclick="return confirm('¿Está seguro de eliminar esta póliza?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="fila-vacia">
                            <td colspan="7" class="text-center py-3">No hay pólizas emitidas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection