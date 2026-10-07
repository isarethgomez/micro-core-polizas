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
    $request->validate([
        'tipo_documento'   => 'required|in:V,E,J,G,P',
        'numero_documento' => [
            'required',
            'string',
            'max:50',
            Rule::unique('terceros')->where(function ($query) use ($request) {
                return $query->where('tipo_documento', $request->tipo_documento);
            }),
        ],
        'nombres'   => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'telefono'  => 'required|string|max:50',
        'email'     => 'required|email|max:255|unique:terceros,email',
        'direccion' => 'nullable|string',
        'estatus'   => 'required|in:activo,inactivo',
    ], [
        'numero_documento.unique' => 'No se puede registrar: la cédula/documento ingresado ya pertenece a un tercero existente.',
        'email.unique'            => 'No se puede registrar: el correo electrónico ingresado ya fue utilizado anteriormente.',
    ]);

    Tercero::create($request->all());

    return redirect()->route('terceros.index')->with('success', 'Tercero registrado exitosamente.');
}
    public function edit(Tercero $tercero)
    {
        return view('terceros.edit', compact('tercero'));
    }

    public function update(Request $request, Tercero $tercero)
    {
        $request->validate([
            'tipo_documento'   => 'required|in:V,E,J,G,P',
            'numero_documento' => [
                'required',
                'string',
                'max:50',
                Rule::unique('terceros')->where(function ($query) use ($request) {
                    return $query->where('tipo_documento', $request->tipo_documento);
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
            'numero_documento.unique' => 'Ya existe otro tercero registrado con este mismo tipo y número de documento.',
            'email.unique'            => 'El correo electrónico pertenece a otro tercero.',
        ]);

        $tercero->update($request->all());

        return redirect()->route('terceros.index')->with('success', 'Tercero actualizado exitosamente.');
    }
}