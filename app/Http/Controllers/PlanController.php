<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    // Mostrar la lista de todos los planes
    public function index()
    {
        $lista_planes = Plan::all();
        return view('planes.index', compact('lista_planes'));
    }

    // Mostrar el formulario para crear un nuevo plan
    public function create()
    {
        return view('planes.create');
    }

    // Guardar el nuevo plan en la base de datos
    public function store(Request $request)
    {
        $datos_validados = $request->validate([
            'nombre' => 'required|string|max:255',
            'suma_asegurada' => 'required|numeric|min:0',
            'costo_mensual' => 'required|numeric|min:0',
            'estatus' => 'required|in:activo,inactivo',
        ]);

        Plan::create($datos_validados);

        return redirect()->route('planes.index')->with('exito', 'Plan creado exitosamente.');
    }

    // Mostrar el formulario para editar un plan existente
    public function edit(Plan $plan)
    {
        return view('planes.edit', compact('plan'));
    }

    // Actualizar los datos del plan en la base de datos
    public function update(Request $request, Plan $plan)
    {
        $datos_validados = $request->validate([
            'nombre' => 'required|string|max:255',
            'suma_asegurada' => 'required|numeric|min:0',
            'costo_mensual' => 'required|numeric|min:0',
            'estatus' => 'required|in:activo,inactivo',
        ]);

        $plan->update($datos_validados);

        return redirect()->route('planes.index')->with('exito', 'Plan actualizado exitosamente.');
    }

    // Eliminar un plan de la base de datos
    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('planes.index')->with('exito', 'Plan eliminado exitosamente.');
    }
}