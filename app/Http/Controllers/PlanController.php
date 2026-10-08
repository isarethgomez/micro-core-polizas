<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $lista_planes = Plan::latest()->get();
        return view('planes.index', compact('lista_planes'));
    }

    public function create()
    {
        return view('planes.create');
    }

    public function store(Request $request)
    {
        $datos_validados = $request->validate([
            'nombre' => 'required|string|max:255',
            'suma_asegurada' => 'required|numeric|min:0',
            'costo_mensual' => 'required|numeric|min:0',
            'estatus' => 'required|in:activo,inactivo',
        ]);

        Plan::create($datos_validados);

        return redirect()->route('planes.index')
            ->with('success', 'Plan creado exitosamente.');
    }

    public function edit(Plan $plane)
    {
        $plan = $plane;
        return view('planes.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plane)
    {
        $datos_validados = $request->validate([
            'nombre' => 'required|string|max:255',
            'suma_asegurada' => 'required|numeric|min:0',
            'costo_mensual' => 'required|numeric|min:0',
            'estatus' => 'required|in:activo,inactivo',
        ]);

        $plane->update($datos_validados);

        return redirect()->route('planes.index')
            ->with('success', 'Plan actualizado exitosamente.');
    }

    public function destroy(Plan $plane)
    {
        $plane->delete();

        return redirect()->route('planes.index')
            ->with('success', 'Plan eliminado exitosamente.');
    }
}