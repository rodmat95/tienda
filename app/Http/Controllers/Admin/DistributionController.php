<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distribution;
use App\Models\Supplier;
use App\Models\Product;
use App\Http\Requests\DistributionRequest;
use Illuminate\Support\Facades\Cache;

class DistributionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.distributions.index')->only('index');
        $this->middleware('can:admin.distributions.create')->only('create', 'store');
        $this->middleware('can:admin.distributions.edit')->only('edit', 'update');
        $this->middleware('can:admin.distributions.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.distributions.index');
    }

    public function create()
    {
        $supplier = Supplier::where('user_id', auth()->user()->id)->first();
        $products = Product::where('status', 2)->pluck('name', 'id');

        return view('admin.distributions.create', compact('supplier', 'products'));
    }

    public function store(DistributionRequest $request)
    {
        $distribution = Distribution::create($request->all());

        Cache::flush();

        return redirect()->route('admin.distributions.edit', compact('distribution'))->with('info', 'Distribución Creada Exitosamente');
    }

    public function edit(Distribution $distribution)
    {
        $this->authorize('author', $distribution);

        $products = Product::where('status', 2)->pluck('name', 'id');

        return view('admin.distributions.edit', compact('distribution', 'products'));
    }

    public function update(DistributionRequest $request, Distribution $distribution)
    {
        $this->authorize('author', $distribution);

        $distribution->update($request->all());

        Cache::flush();

        return redirect()->route('admin.distributions.edit', $distribution)->with('info', 'Distribución Actualizada Exitosamente');
    }

    public function destroy(Distribution $distribution)
    {
        $this->authorize('author', $distribution);

        $dataToValidate = [
            'Precio' => $distribution->price,
            'Existencias' => $distribution->stock,
        ];

        foreach ($dataToValidate as $key => $value) {
            if (empty($value)) {
                return redirect()->back()->with('error', 'Completa los campos faltantes: ' . $key);
            }
        }

        $newStatus = $distribution->status == 1 ? 2 : 1;
        $distribution->update(['status' => $newStatus]);

        Cache::flush();

        return redirect()->back()->with('info', 'Estado cambiado exitosamente.');
    }
}
