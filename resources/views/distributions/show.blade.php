<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Articulo Principal --}}
            <div class="lg:col-span-2">
                <article
                    class="bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden shadow-md flex flex-col lg:flex-row mb-4">
                    <figure class="lg:w-1/2 lg:mb-0">
                        <img class="w-full h-full object-cover object-center rounded-lg lg:rounded-l-lg lg:rounded-r-none"
                            src="@if ($distribution->product->image) {{ Storage::url($distribution->product->image->url) }} @else https://www.donofriodelivery.com/assets/imagenes/productos/sinimagen.jpg @endif"
                            alt="{{ $distribution->product->name }}">
                    </figure>
                    <div class="bg-gray-200 dark:bg-gray-800 p-6 lg:w-1/2 lg:pl-8 flex flex-col">
                        <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
                            {{ $distribution->product->name }}</h1>
                        <div class="mb-4">
                            <span class="text-gray-600 dark:text-gray-400">{{ $distribution->supplier->name }}</span>
                        </div>
                        <div class="mb-4">
                            <span class="text-gray-600 dark:text-gray-400">Precio: </span>
                            <span class="text-green-500 dark:text-green-400">S/.
                                {{ number_format($distribution->price, 2) }}</span>
                        </div>
                        <div class="mb-4">
                            <span class="text-gray-600 dark:text-gray-400">Stock: </span>
                            @php
                                $stock = $distribution->stock;
                            @endphp
                            <span
                                class="{{ $stock <= 10
                                    ? 'text-orange-500 dark:text-orange-400'
                                    : ($stock <= 20
                                        ? 'text-yellow-500 dark:text-yellow-400'
                                        : ($stock <= 30
                                            ? 'text-lime-500 dark:text-lime-400'
                                            : 'text-green-500 dark:text-green-400')) }}">
                                {{ $stock }}
                            </span>
                        </div>
                        <div class="mt-auto">
                            <form action="{{ route('distributions.addToCart', $distribution) }}" method="post">
                                @csrf
                                @method('patch')
                                <button type="submit"
                                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-gray-200 mb-4 py-2 px-4 rounded-md">
                                    Compar
                                </button>
                            </form>
                            <form action="{{ route('distributions.addToCart', $distribution) }}" method="post">
                                @csrf
                                @method('patch')
                                <button type="submit"
                                    class="w-full border border-indigo-600 hover:border-indigo-700 text-indigo-600 hover:text-indigo-700 mb-4 py-2 px-4 rounded-md">
                                    Agregar al carrito
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
                <h2 class="font-semibold text-gray-600 dark:text-gray-400">Descripción del producto</h2>
                <div
                    class="bg-gray-200 dark:bg-gray-800 rounded-lg overflow-hidden shadow-md p-6 text-start mx-auto mb-4">
                    <span class="text-gray-600 dark:text-gray-400">{!! $distribution->product->description !!}</span>
                </div>
                <h2 class="font-semibold text-gray-600 dark:text-gray-400">Detalles del producto</h2>
                <div
                    class="bg-gray-200 dark:bg-gray-800 rounded-lg overflow-hidden shadow-md p-6 text-start mx-auto mb-4">
                    <span class="text-gray-600 dark:text-gray-400">{!! $distribution->product->detail !!}</span>
                </div>
            </div>

            {{-- Otros Productos del Vendedor --}}
            <aside class="">
                <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Otros productos de
                    {{ $distribution->supplier->name }}</h1>
                <ul>
                    @forelse ($otros as $otro)
                        <li class="mb-4">
                            <article class="bg-gray-200 dark:bg-gray-800 rounded-lg overflow-hidden shadow-md">
                                <div class="flex items-center">
                                    <img class="bg-gray-200 dark:bg-gray-700 w-36 h-full object-cover object-center"
                                        src="@if ($otro->product->image) {{ Storage::url($otro->product->image->url) }} @else https://www.donofriodelivery.com/assets/imagenes/productos/sinimagen.jpg @endif"
                                        alt="{{ $otro->product->name }}">
                                    <div class="ml-4">
                                        <h1 class="font-semibold mb-2 text-gray-800 dark:text-gray-200 h-10">
                                            <a href="{{ route('distributions.show', $otro) }}"
                                                class="hover:text-indigo-500 dark:hover:text-indigo-300">
                                                {{ $otro->product->name }}
                                            </a>
                                        </h1>
                                        <div class="mt-2">
                                            <span class="text-gray-600 dark:text-gray-400">Precio: </span>
                                            <span class="text-green-500 dark:text-green-400">S/.
                                                {{ number_format($otro->price, 2) }}</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <div class="mt-4">
                                                <span class="text-gray-500 dark:text-gray-400">Stock: </span>
                                                @php
                                                    $stock = $otro->stock;
                                                @endphp
                                                <span
                                                    class="{{ $stock <= 10
                                                        ? 'text-orange-500 dark:text-orange-400'
                                                        : ($stock <= 20
                                                            ? 'text-yellow-500 dark:text-yellow-400'
                                                            : ($stock <= 30
                                                                ? 'text-lime-500 dark:text-lime-400'
                                                                : 'text-green-500 dark:text-green-400')) }}">
                                                    {{ $stock }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </li>
                    @empty
                        <div class="col-span-1 mx-auto">
                            <div
                                class="bg-gray-200 dark:bg-gray-800 rounded-lg overflow-hidden shadow-md p-6 text-center mx-auto mt-8">
                                <p class="text-gray-500 dark:text-gray-400">Este es el primer producto de
                                    {{ $distribution->supplier->name }}.</p>
                            </div>
                        </div>
                    @endforelse
                </ul>
            </aside>
        </div>

        {{-- Otras ofertas --}}
        <div class="mt-8">
            <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
                Otras ofertas para {{ $distribution->product->name }}</h1>
            <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($ofertas as $oferta)
                    <li class="mb-4">
                        <h2 class="font-semibold text-start text-gray-600 dark:text-gray-400 h-12 mb-2">
                            {{ $oferta->supplier->name }}</h2>
                        <article class="bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden shadow-md">
                            <img class="w-full h-full object-cover object-center"
                                src="@if ($oferta->product->image) {{ Storage::url($oferta->product->image->url) }} @else https://www.donofriodelivery.com/assets/imagenes/productos/sinimagen.jpg @endif"
                                alt="{{ $oferta->product->name }}">
                            <div class="p-6 bg-gray-200 dark:bg-gray-800">
                                <h1 class="text-center font-semibold mb-2 text-gray-800 dark:text-gray-200 h-10">
                                    <a href="{{ route('distributions.show', $oferta) }}"
                                        class="hover:text-indigo-500 dark:hover:text-indigo-300">
                                        {{ $oferta->product->name }}
                                    </a>
                                </h1>
                                <div class="text-left">
                                    <span class="text-gray-500 dark:text-gray-400">Precio: </span>
                                    <span class="text-green-500 dark:text-green-400">
                                        S/. {{ number_format($oferta->price, 2) }}
                                    </span>
                                    <div class="mb-4">
                                        <span class="text-gray-500 dark:text-gray-400">Stock: </span>
                                        @php
                                            $stock = $oferta->stock;
                                        @endphp
                                        <span
                                            class="{{ $stock <= 10
                                                ? 'text-orange-500 dark:text-orange-400'
                                                : ($stock <= 20
                                                    ? 'text-yellow-500 dark:text-yellow-400'
                                                    : ($stock <= 30
                                                        ? 'text-lime-500 dark:text-lime-400'
                                                        : 'text-green-500 dark:text-green-400')) }}">
                                            {{ $stock }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center">
                                    <form action="{{ route('distributions.addToCart', $oferta) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <button type="submit"
                                            class="bg-indigo-600 hover:bg-indigo-700 text-gray-200 py-2 px-4 rounded-md">
                                            Agregar al carrito
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    </li>
                @empty
                    <div class="col-span-1 mx-auto">
                        <div
                            class="bg-gray-200 dark:bg-gray-800 rounded-lg overflow-hidden shadow-md p-6 text-center mx-auto mt-8">
                            <p class="text-gray-500 dark:text-gray-400">No hay otras ofertas en este momento.</p>
                        </div>
                    </div>
                @endforelse
            </ul>
        </div>

        {{-- Mas Produtos Relacionados --}}
        <div class="mt-8">
            <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Más productos de
                {{ $distribution->product->category->name }}</h1>
            <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse ($relacionados as $relacionado)
                    <li class="mb-4">
                        <article class="bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden shadow-md">
                            <img class="w-full h-full object-cover object-center"
                                src="@if ($relacionado->product->image) {{ Storage::url($relacionado->product->image->url) }} @else https://www.donofriodelivery.com/assets/imagenes/productos/sinimagen.jpg @endif"
                                alt="{{ $relacionado->product->name }}">
                            <div class="p-6 bg-gray-200 dark:bg-gray-800">
                                <h1 class="text-center font-semibold mb-2 text-gray-800 dark:text-gray-200 h-10">
                                    <a href="{{ route('distributions.show', $relacionado) }}"
                                        class="hover:text-indigo-500 dark:hover:text-indigo-300">
                                        {{ $relacionado->product->name }}
                                    </a>
                                </h1>
                                <div class="text-left">
                                    <span class="text-gray-500 dark:text-gray-400">Precio: </span>
                                    <span class="text-green-500 dark:text-green-400">
                                        S/. {{ number_format($relacionado->price, 2) }}
                                    </span>
                                    <div class="mb-4">
                                        <span class="text-gray-500 dark:text-gray-400">Stock: </span>
                                        @php
                                            $stock = $relacionado->stock;
                                        @endphp
                                        <span
                                            class="{{ $stock <= 10
                                                ? 'text-orange-500 dark:text-orange-400'
                                                : ($stock <= 20
                                                    ? 'text-yellow-500 dark:text-yellow-400'
                                                    : ($stock <= 30
                                                        ? 'text-lime-500 dark:text-lime-400'
                                                        : 'text-green-500 dark:text-green-400')) }}">
                                            {{ $stock }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center">
                                    <form action="{{ route('distributions.addToCart', $relacionado) }}"
                                        method="post">
                                        @csrf
                                        @method('patch')
                                        <button type="submit"
                                            class="bg-indigo-600 hover:bg-indigo-700 text-gray-200 py-2 px-4 rounded-md">
                                            Agregar al carrito
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </article>
                    </li>
                @empty
                    <div class="col-span-1 mx-auto">
                        <div
                            class="bg-gray-200 dark:bg-gray-800 rounded-lg overflow-hidden shadow-md p-6 text-center mx-auto mt-8">
                            <p class="text-gray-500 dark:text-gray-400">Por el momento no más en
                                {{ $distribution->product->category->name }}.</p>
                        </div>
                    </div>
                @endforelse
            </ul>
        </div>
    </div>
</x-app-layout>
