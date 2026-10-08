<?php

namespace App\Http\Controllers;

use App\Models\Poliza;
use App\Models\Tercero;
use App\Models\Plan;
use Illuminate\Http\Request;

class PolizaController extends Controller
{
    public function index()
    {
        $lista_polizas = Poliza::with(['tercero', 'plan'])->latest()->get();
        return view('polizas.index', compact('lista_polizas'));
    }

    public function create()
    {
        $terceros_activos = Tercero::where('estatus', 'activo')->get();
        $planes_activos = Plan::where('estatus', 'activo')->get();
        return view('polizas.create', compact('terceros_activos', 'planes_activos'));
    }

    public function store(Request $request)
    {
        $datos_validados = $request->validate([
            'tercero_id' => 'required|exists:terceros,id',
            'plan_id' => 'required|exists:planes,id',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
            'estatus' => 'required|in:activa,inactiva',
        ]);

        Poliza::create($datos_validados);

        return redirect()->route('polizas.index')
            ->with('success', 'Póliza emitida exitosamente.');
    }

    public function edit(Poliza $poliza)
    {
        $lista_terceros = Tercero::all();
        $lista_planes = Plan::all();
        return view('polizas.edit', compact('poliza', 'lista_terceros', 'lista_planes'));
    }

    public function update(Request $request, Poliza $poliza)
    {
        $datos_validados = $request->validate([
            'tercero_id' => 'required|exists:terceros,id',
            'plan_id' => 'required|exists:planes,id',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after_or_equal:fecha_inicio',
            'estatus' => 'required|in:activa,inactiva',
        ]);

        $poliza->update($datos_validados);

        return redirect()->route('polizas.index')
            ->with('success', 'Póliza actualizada exitosamente.');
    }

    public function destroy(Poliza $poliza)
    {
        $poliza->delete();

        return redirect()->route('polizas.index')
            ->with('success', 'Póliza eliminada exitosamente.');
    }
}