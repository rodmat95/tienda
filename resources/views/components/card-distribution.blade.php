@props(['distribution'])

<article class="bg-white dark:bg-gray-700 rounded-lg overflow-hidden shadow-md">
    <img class="w-full h-auto object-contain object-center"
        src="@if ($distribution->product->image) {{ Storage::url($distribution->product->image->url) }} @else https://www.donofriodelivery.com/assets/imagenes/productos/sinimagen.jpg @endif"
        alt="{{ $distribution->product->name }}">
    <div class="p-6 bg-gray-200 dark:bg-gray-800">
        <div class="mt-4 h-12">
            <span class="text-gray-500 dark:text-gray-400">
                Vendedor:
                <a href="{{ route('distributions.supplier', $distribution->supplier_id) }}"
                    class="hover:text-indigo-400 dark:hover:text-indigo-200">
                    {{ $distribution->supplier->name ?? 'N/A' }}
                </a>
            </span>
        </div>
        <h1 class="text-center text-xl font-semibold mb-2 text-gray-800 dark:text-white">
            <a href="{{ route('distributions.show', $distribution) }}"
                class="hover:text-indigo-500 dark:hover:text-indigo-300">
                {{ $distribution->product->name }}
            </a>
        </h1>
        <div class="text-left mt-4">
            <span class="text-gray-500 dark:text-gray-400">Precio: </span>
            <span class="text-green-500 dark:text-green-400">S/.
                {{ number_format($distribution->price, 2) }}</span>
        </div>
        <div class="flex justify-between items-center">
            <div class="mt-4">
                <span class="text-gray-500 dark:text-gray-400">Stock: </span>
                @php
                    $stock = $distribution->stock;
                @endphp
                <span
                    class="{{ $stock == 0
                        ? 'text-red-500 dark:text-red-400'
                        : ($stock <= 10
                            ? 'text-orange-500 dark:text-orange-400'
                            : ($stock <= 20
                                ? 'text-yellow-500 dark:text-yellow-400'
                                : ($stock <= 30
                                    ? 'text-lime-500 dark:text-lime-400'
                                    : 'text-green-500 dark:text-green-400'))) }}">
                    {{ $stock }}
                </span>
            </div>
            <form action="{{ route('distributions.addToCart', $distribution) }}" method="post">
                @csrf
                @method('patch')
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md">
                    Agregar al carrito
                </button>
            </form>
        </div>
    </div>
</article>