<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function __construct() {
        $this->middleware('can:admin.commissions.index')->only('index');
        $this->middleware('can:admin.commissions.create')->only('create', 'store');
        $this->middleware('can:admin.commissions.edit')->only('edit', 'update');
        $this->middleware('can:admin.commissions.destroy')->only('destroy');
    }

    public function index()
    {
        $commissions = Commission::all();

        return view('admin.commissions.index', compact('commissions'));
    }

    public function create()
    {
        return view('admin.commissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'slug' => 'required|unique:commissions',
            'rate' => 'required'
        ]);

        $commission = Commission::create($request->all());

        /* return redirect()->route('admin.commissions.edit', compact('commission'))->with('info', 'Comisión Creada Exitosamente'); */
        return redirect()->route('admin.commissions.edit', $commission)->with('info', 'Comisión Creada Exitosamente');
    }

    public function edit(Commission $commission)
    {
        return view('admin.commissions.edit', compact('commission'));
    }

    public function update(Request $request, Commission $commission)
    {
        $request->validate([
            'type' => 'required',
            'slug' => "required|unique:commissions,slug,$commission->id",
            'rate' => 'required',
        ]);

        $commission->update($request->all());

        return redirect()->route('admin.commissions.edit', $commission)->with('info', 'Comisión Actualizada Exitosamente');
    }

    public function destroy(Commission $commission)
    {
        $activeSuppliers = $commission->suppliers()->where('status', 2)->count();

        if ($activeSuppliers > 0) {
            return redirect()->back()->with('error', 'No se puede inhabilitar la comisión porque está asignada a uno o más vendedores activos.');
        }

        $newStatus = $commission->status == 1 ? 2 : 1;
        $commission->update(['status' => $newStatus]);

        return redirect()->back()->with('info', 'Estado cambiado exitosamente.');
    }
}