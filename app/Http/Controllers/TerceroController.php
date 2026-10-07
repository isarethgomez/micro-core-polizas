<?php

namespace App\Http\Controllers;

use App\Models\Tercero;
use Illuminate\Http\Request;

class TerceroController extends Controller
{
    public function index()
    {
        $lista_terceros = Tercero::latest()->get();
        return view('terceros.index', compact('lista_terceros'));
    }

    public function create()
    {
        return view('terceros.create');
    }

    public function store(Request $request)
    {
        $datos_validados = $request->validate([
            'cedula' => 'required|string|unique:terceros,cedula',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'estatus' => 'required|in:activo,inactivo',
        ]);

        Tercero::create($datos_validados);

        return redirect()->route('terceros.index')
            ->with('success', 'Tercero registrado exitosamente.');
    }

    public function edit(Tercero $tercero)
    {
        return view('terceros.edit', compact('tercero'));
    }

    public function update(Request $request, Tercero $tercero)
    {
        $datos_validados = $request->validate([
            'cedula' => 'required|string|unique:terceros,cedula,' . $tercero->id,
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'estatus' => 'required|in:activo,inactivo',
        ]);

        $tercero->update($datos_validados);

        return redirect()->route('terceros.index')
            ->with('success', 'Tercero actualizado exitosamente.');
    }

    public function destroy(Tercero $tercero)
    {
        $tercero->delete();

        return redirect()->route('terceros.index')
            ->with('success', 'Tercero eliminado exitosamente.');
    }
}