<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Models\Commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function __construct() {
        $this->middleware('can:admin.suppliers.index')->only('index');
        /* $this->middleware('can:admin.suppliers.create')->only('create', 'store'); */
        $this->middleware('can:admin.suppliers.edit')->only('edit', 'update');
        $this->middleware('can:admin.suppliers.destroy')->only('destroy');
    }

    public function index()
    {
        $suppliers = Supplier::all();

        return view('admin.suppliers.index', compact('suppliers'));
    }

    /* public function create()
    {
        $commissions = Commission::where('status', 2)->pluck('type', 'id');

        return view('admin.suppliers.create', compact('commissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:suppliers',
            'commission_id' => 'required',
        ]);

        $supplier = Supplier::create($request->all());

        return redirect()->route('admin.suppliers.edit', compact('supplier'));
    } */

    public function edit(Supplier $supplier)
    {
        $commissions = Commission::where('status', 2)->pluck('type', 'id');

        return view('admin.suppliers.edit', compact('supplier', 'commissions'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:suppliers,slug,$supplier->id",
            'commission_id' => 'required',
        ]);

        $supplier->update($request->all());

        return redirect()->route('admin.suppliers.edit', $supplier)->with('info', 'Proveedor Actualizado Exitosamente');
    }

    public function destroy(Supplier $supplier)
    {
        $hasActiveDistribution = DB::table('distributions')
            ->where('supplier_id', $supplier->id)
            ->where('status', 2)
            ->exists();

        if ($hasActiveDistribution) {
            return redirect()->back()->with('error', 'No se puede inhabilitar el vendedor. Tiene uno o más productos activos.');
        }

        $newStatus = $supplier->status == 1 ? 2 : 1;
        $supplier->update(['status' => $newStatus]);

        return redirect()->back()->with('info', 'Estado cambiado exitosamente.');
    }
}