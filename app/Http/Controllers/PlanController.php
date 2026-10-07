<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PlanController extends Controller
{
    public function index()
    {
        $planes = Plan::latest()->get();
        return view('planes.index', compact('planes'));
    }

    public function create()
    {
        return view('planes.create');
    }

    public function store(Request $request)
    {
        $datos_validados = $request->validate([
            'nombre'          => 'required|string|max:255|unique:plans,nombre',
            'monto-cobertura' => 'required|numeric|min:0',
            'prima'           => 'required|numeric|min:0',
            'estatus'         => 'required|in:activo,inactivo',
        ], [
            'nombre.unique' => 'Ya existe un plan registrado con este nombre.',
        ]);

       
        Plan::create([
            'nombre'          => $datos_validados['nombre'],
            'monto_cobertura' => $datos_validados['monto-cobertura'],
            'prima'           => $datos_validados['prima'],
            'estatus'         => $datos_validados['estatus'],
        ]);

        return redirect()->route('planes.index')->with('success', 'Plan creado exitosamente.');
    }

    public function edit(Plan $plan)
    {
        return view('planes.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan)
{
    $datos_validados = $request->validate([
        'nombre' => [
            'required',
            'string',
            'max:255',
            Rule::unique('plans', 'nombre')->ignore($plan->id),
        ],
        'monto-cobertura' => 'required|numeric|min:0',
        'prima'           => 'required|numeric|min:0',
        'estatus'         => 'required|in:activo,inactivo',
    ], [
        'nombre.unique' => 'Ya existe otro plan registrado con este nombre.',
    ]);

    // Mapeo explicito de kebab-case (HTML) a snake_case (Base de Datos)
    $plan->update([
        'nombre'          => $datos_validados['nombre'],
        'monto_cobertura' => $datos_validados['monto-cobertura'],
        'prima'           => $datos_validados['prima'],
        'estatus'         => $datos_validados['estatus'],
    ]);

    return redirect()->route('planes.index')->with('success', 'Plan actualizado exitosamente.');
}
}