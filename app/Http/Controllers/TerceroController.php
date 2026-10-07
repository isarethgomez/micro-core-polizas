<?php

namespace App\Http\Controllers;

use App\Models\Tercero;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TerceroController extends Controller
{
    public function index()
    {
        $terceros = Tercero::latest()->get();
        return view('terceros.index', compact('terceros'));
    }

    public function create()
    {
        return view('terceros.create');
    }

    public function store(Request $request)
    {
        $datos_validados = $request->validate([
            'cedula'           => 'required|string|max:20|unique:terceros,cedula',
            'nombre'           => 'required|string|max:255',
            'apellido'         => 'required|string|max:255',
            'telefono'         => 'required|string|max:50',
            'direccion'        => 'required|string|max:500',
            'fecha-nacimiento' => 'required|date',
            'estatus'          => 'required|in:activo,inactivo',
        ], [
            'cedula.unique' => 'La cédula ingresada ya se encuentra registrada.',
        ]);

        Tercero::create([
            'cedula'           => $datos_validados['cedula'],
            'nombre'           => $datos_validados['nombre'],
            'apellido'         => $datos_validados['apellido'],
            'telefono'         => $datos_validados['telefono'],
            'direccion'        => $datos_validados['direccion'],
            'fecha_nacimiento' => $datos_validados['fecha-nacimiento'],
            'estatus'          => $datos_validados['estatus'],
        ]);

        return redirect()->route('terceros.index')->with('success', 'Tercero registrado exitosamente.');
    }

    public function edit(Tercero $tercero)
    {
        return view('terceros.edit', compact('tercero'));
    }

    public function update(Request $request, Tercero $tercero)
    {
        $datos_validados = $request->validate([
            'cedula'           => [
                'required',
                'string',
                'max:20',
                Rule::unique('terceros', 'cedula')->ignore($tercero->id),
            ],
            'nombre'           => 'required|string|max:255',
            'apellido'         => 'required|string|max:255',
            'telefono'         => 'required|string|max:50',
            'direccion'        => 'required|string|max:500',
            'fecha-nacimiento' => 'required|date',
            'estatus'          => 'required|in:activo,inactivo',
        ], [
            'cedula.unique' => 'La cédula ingresada ya pertenece a otro tercero.',
        ]);

        $tercero->update([
            'cedula'           => $datos_validados['cedula'],
            'nombre'           => $datos_validados['nombre'],
            'apellido'         => $datos_validados['apellido'],
            'telefono'         => $datos_validados['telefono'],
            'direccion'        => $datos_validados['direccion'],
            'fecha_nacimiento' => $datos_validados['fecha-nacimiento'],
            'estatus'          => $datos_validados['estatus'],
        ]);

        return redirect()->route('terceros.index')->with('success', 'Tercero actualizado exitosamente.');
    }

    public function destroy(Tercero $tercero)
    {
        $tercero->delete();
        return redirect()->route('terceros.index')->with('success', 'Tercero eliminado exitosamente.');
    }
}