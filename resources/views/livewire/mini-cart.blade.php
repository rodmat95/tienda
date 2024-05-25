<div class="relative w-screen max-w-sm right-0 z-10 mt-2 origin-top-right rounded-md bg-white dark:bg-gray-800 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none px-4 py-8"
    aria-modal="true" role="dialog" tabindex="-1">
    {{-- <button class="absolute end-4 top-4 text-gray-500 dark:text-gray-400 transition hover:scale-110">
        <span class="sr-only">Close cart</span>

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="h-5 w-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button> --}}

    <div class="space-y-6">
        @if (Auth::user())
            <ul role="list" class="-mt-6 space-y-4">
                @foreach ($cartItems as $item)
                    <li class="flex p-3 mb-2 {{-- bg-white dark:bg-gray-700 --}} rounded-md items-center gap-4">
                        <img src="@if ($item->distribution->product->image) {{ Storage::url($item->distribution->product->image->url) }} @else https://www.donofriodelivery.com/assets/imagenes/productos/sinimagen.jpg @endif"
                            alt="{{ $item->distribution->product->name }} " class="h-16 w-16 rounded object-cover" />

                        <div>
                            <h3 class="text-sm text-gray-800 dark:text-white">
                                {{ $item->distribution->product->name }}    
                            </h3>

                            <dl class="mt-0.5 space-y-px text-[10px] text-gray-500 dark:text-gray-400">
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

                        <div class="flex flex-1 items-center justify-end gap-2">
                            <form>
                                <label for="Line1Qty" class="sr-only"> Quantity </label>

                                <input type="number" min="1" value="{{ $item->quantity }}" id="Line1Qty"
                                    class="h-8 w-12 rounded border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 p-0 text-center text-xs text-gray-500 dark:text-gray-400 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none" />
                            </form>
                            <form wire:submit.prevent="deleteFromCart({{ $item->id }})" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-gray-500 dark:text-gray-400 transition hover:text-red-600">
                                    <span class="sr-only">Remove item</span>
    
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="space-y-4 text-center">
                <a href="@if(count($cartItems) > 0){{ route('sales.index') }}@endif" class="block rounded px-5 py-3 text-sm text-white bg-indigo-600 hover:bg-indigo-700 ">
                    Ir a pagar
                </a>

                <a href="{{ route('shopping_carts.index') }}"
                    class="block rounded px-5 pt-3 text-sm text-purple-400 hover:text-indigo-400">
                    Ver carrito
                </a>
            </div>
        @else
            <div class="space-y-4 text-center">
                <h3 class="text-sm text-gray-800 dark:text-white">Para poder guardar productos por favor inicia sesión
                </h3>
                <a href="{{ route('login') }}"
                    class="block rounded px-5 py-3 text-sm text-white bg-indigo-600 hover:bg-indigo-700 ">
                    iniciar sesión
                </a>
                <a href="{{ route('register') }}"
                    class="block rounded px-5 py-3 text-sm text-white bg-indigo-600 hover:bg-indigo-700 ">
                    Registrarse
                </a>
            </div>
        @endif
    </div>
</div>