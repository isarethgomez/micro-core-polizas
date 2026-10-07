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
            'nombre'         => 'required|string|max:255|unique:plans,nombre',
            'suma-asegurada' => 'required|numeric|min:0',
            'costo-mensual'  => 'required|numeric|min:0',
            'estatus'        => 'required|in:activo,inactivo',
        ]);

        Plan::create([
            'nombre'         => $datos_validados['nombre'],
            'suma_asegurada' => $datos_validados['suma-asegurada'],
            'costo_mensual'  => $datos_validados['costo-mensual'],
            'estatus'        => $datos_validados['estatus'],
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
            'nombre'         => [
                'required',
                'string',
                'max:255',
                Rule::unique('plans', 'nombre')->ignore($plan->id),
            ],
            'suma-asegurada' => 'required|numeric|min:0',
            'costo-mensual'  => 'required|numeric|min:0',
            'estatus'        => 'required|in:activo,inactivo',
        ]);

        $plan->update([
            'nombre'         => $datos_validados['nombre'],
            'suma_asegurada' => $datos_validados['suma-asegurada'],
            'costo_mensual'  => $datos_validados['costo-mensual'],
            'estatus'        => $datos_validados['estatus'],
        ]);

        return redirect()->route('planes.index')->with('success', 'Plan actualizado exitosamente.');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('planes.index')->with('success', 'Plan eliminado exitosamente.');
    }
}