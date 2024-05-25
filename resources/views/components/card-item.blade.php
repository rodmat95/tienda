@props(['item'])

<li class="flex gap-4">
    <img src="@if ($item->distribution->product->image) {{ Storage::url($item->distribution->product->image->url) }} @else https://www.donofriodelivery.com/assets/imagenes/productos/sinimagen.jpg @endif"
        alt="{{ $item->distribution->product->name }} "
        class="bg-white dark:bg-gray-700 rounded-md w-36 h-full object-cover object-center" />
    <div>
        <h3 class="font-semibold mb-2 text-gray-800 dark:text-gray-200 h-10">
            {{ $item->distribution->product->name }}
        </h3>

        <dl class="text-gray-500 dark:text-gray-400">
            <div>
                <dt class="inline">Categoria:</dt>
                <dd class="inline">{{ $item->distribution->product->category->name }}</dd>
            </div>

            <div>
                {{-- <dt class="inline">Precio:</dt> --}}
                <dd class="inline">S/. {{ $item->distribution->price }}</dd>
            </div>
        </dl>
    </div>

    <div class="flex flex-1 justify-end gap-2">
        <form>
            <label for="Line1Qty" class="sr-only"> Quantity </label>

            <input type="number" min="1" value="{{ $item->quantity }}" id="Line1Qty"
                class="h-8 w-12 rounded border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 p-0 text-center text-xs text-gray-500 dark:text-gray-400 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
        </form>
        <form action="{{ route('shopping_carts.delete', $item->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="text-gray-500 dark:text-gray-400 transition hover:text-red-600">
                <span class="sr-only">Remove item</span>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="h-5 w-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </form>
    </div>
</li>