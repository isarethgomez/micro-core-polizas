<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $planes = Plan::all();
        return view('planes.index', compact('planes'));
    }

    public function create()
    {
        return view('planes.create');
    }

    public function store(Request $request)
    {
        $datosValidados = $request->validate([
            'nombre' => 'required|string|max:255',
            'suma_asegurada' => 'required|numeric|min:0',
            'costo_mensual' => 'required|numeric|min:0',
            'estatus' => 'required|in:activo,inactivo',
        ]);

        Plan::create($datosValidados);

        return redirect()->route('planes.index')->with('exito', 'Plan creado exitosamente.');
    }

    public function edit(Plan $plan)
    {
        return view('planes.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan)
    {
        $datosValidados = $request->validate([
            'nombre' => 'required|string|max:255',
            'suma_asegurada' => 'required|numeric|min:0',
            'costo_mensual' => 'required|numeric|min:0',
            'estatus' => 'required|in:activo,inactivo',
        ]);

        $plan->update($datosValidados);

        return redirect()->route('planes.index')->with('exito', 'Plan actualizado exitosamente.');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();

        return redirect()->route('planes.index')->with('exito', 'Plan eliminado exitosamente.');
    }
}
