<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('can:admin.products.index')->only('index');
        $this->middleware('can:admin.products.create')->only('create', 'store');
        $this->middleware('can:admin.products.edit')->only('edit', 'update');
        $this->middleware('can:admin.products.destroy')->only('destroy');
    }

    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status', 2)->pluck('name', 'id');

        return view('admin.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('products', $request->file('file'));

            $product->image()->create(['url' => $url]);
        }

        return redirect()->route('admin.products.edit', $product)->with('info', 'Producto creado exitosamente');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('status', 2)->pluck('name', 'id');

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('products', $request->file('file'));

            if ($product->image) {
                Storage::delete($product->image->url);

                $product->image->update(['url' => $url]);
            } else {
                $product->image()->create(['url' => $url]);
            }
        }

        return redirect()->route('admin.products.edit', $product)->with('info', 'Producto Actualizado Exitosamente');
    }

    public function destroy(Product $product)
    {
        $hasActiveDistribution = DB::table('distributions')
            ->where('product_id', $product->id)
            ->where('status', 2)
            ->exists();

        if ($hasActiveDistribution) {
            return redirect()->back()->with('error', 'No se puede inhabilitar el producto. Está siendo utilizado por uno o más vendedores activos.');
        }

        $requiredFields = [
            'Categoría' => $product->category_id,
            'Imagen' => $product->image,
            'Descripción' => $product->description,
            'Detalle' => $product->detail,
        ];
    
        foreach ($requiredFields as $fieldName => $fieldValue) {
            if (empty($fieldValue)) {
                return redirect()->back()->with('error', "El campo $fieldName es obligatorio.");
            }
        }

        $newStatus = $product->status == 1 ? 2 : 1;
        $product->update(['status' => $newStatus]);

        return redirect()->back()->with('info', 'Estado cambiado exitosamente.');
    }
}