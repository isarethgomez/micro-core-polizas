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
            'tipo-documento'   => 'required|in:V,E,J,G,P',
            'numero-documento' => [
                'required',
                'string',
                'max:50',
                Rule::unique('terceros', 'numero_documento')->where(function ($query) use ($request) {
                    return $query->where('tipo_documento', $request->input('tipo-documento'));
                }),
            ],
            'nombres'   => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono'  => 'required|string|max:50',
            'email'     => 'required|email|max:255|unique:terceros,email',
            'direccion' => 'nullable|string',
            'estatus'   => 'required|in:activo,inactivo',
        ], [
            'numero-documento.unique' => 'No se puede registrar: la cédula/documento ingresado ya pertenece a un tercero existente.',
            'email.unique'            => 'No se puede registrar: el correo electrónico ingresado ya fue utilizado anteriormente.',
        ]);

        // Mapeo explicito de kebab-case (HTML) a snake_case (Base de Datos / PHP)
        Tercero::create([
            'tipo_documento'   => $datos_validados['tipo-documento'],
            'numero_documento' => $datos_validados['numero-documento'],
            'nombres'          => $datos_validados['nombres'],
            'apellidos'        => $datos_validados['apellidos'],
            'telefono'         => $datos_validados['telefono'],
            'email'            => $datos_validados['email'],
            'direccion'        => $datos_validados['direccion'] ?? null,
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
            'tipo-documento'   => 'required|in:V,E,J,G,P',
            'numero-documento' => [
                'required',
                'string',
                'max:50',
                Rule::unique('terceros', 'numero_documento')->where(function ($query) use ($request) {
                    return $query->where('tipo_documento', $request->input('tipo-documento'));
                })->ignore($tercero->id),
            ],
            'nombres'   => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono'  => 'required|string|max:50',
            'email'     => [
                'required',
                'email',
                'max:255',
                Rule::unique('terceros', 'email')->ignore($tercero->id),
            ],
            'direccion' => 'nullable|string',
            'estatus'   => 'required|in:activo,inactivo',
        ], [
            'numero-documento.unique' => 'No se puede actualizar: la cédula/documento ingresado ya pertenece a otro tercero.',
            'email.unique'            => 'No se puede actualizar: el correo electrónico pertenece a otro tercero.',
        ]);

        // Actualización mapeando a snake_case en PHP
        $tercero->update([
            'tipo_documento'   => $datos_validados['tipo-documento'],
            'numero_documento' => $datos_validados['numero-documento'],
            'nombres'          => $datos_validados['nombres'],
            'apellidos'        => $datos_validados['apellidos'],
            'telefono'         => $datos_validados['telefono'],
            'email'            => $datos_validados['email'],
            'direccion'        => $datos_validados['direccion'] ?? null,
            'estatus'          => $datos_validados['estatus'],
        ]);

        return redirect()->route('terceros.index')->with('success', 'Tercero actualizado exitosamente.');
    }
}