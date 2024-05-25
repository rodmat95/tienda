<x-app-layout>
    <div class="container py-8">
        <h2 class="text-2xl font-semibold mb-6"></h2>
        @if (session('info'))
            <div class="bg-green-800 text-white p-4 mb-4 rounded-md">
                <strong>{{ session('info') }}</strong>
            </div>
        @endif
        <form action="{{ route('recibos') }}" method="post">
            @csrf
            @method('get')
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="col-span-2">
                    <div class="">
                        {{-- Contenido de la información de envío --}}
                        @include('sales.shipping-information')
                    </div>
                    <div class="">
                        {{-- Contenido de la información de pago --}}
                        @include('sales.payment-information')
                    </div>
                </div class="col-span-1">
                <div class="h-min p-6 dark:bg-gray-800 rounded-md shadow-md">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-200 sm:text-ms">Confirmación del Pedido
                    </h3>
                    <dl class="space-y-0.5 text-sm text-gray-700">
                        <div class="my-2 text-gray-500 dark:text-gray-400">
                            <dt>Productos</dt>
                            @foreach ($cartItems as $cartItem)
                                <div class="ml-5 flex justify-between text-gray-400 dark:text-gray-500">
                                    <span>{{ $cartItem->distribution->product->name }}</span>
                                    <span>S/.
                                        {{ number_format($cartItem->distribution->price * $cartItem->quantity, 2) }}</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="border-t my-1 border-gray-400 dark:border-gray-700"></div>
                        <div class="flex justify-between my-2 text-gray-500 dark:text-gray-400">
                            <dt>Subtotal:</dt>
                            <dd>S/. {{ number_format($subTotal, 2) }}</dd>
                        </div>
                        <div class="border-t my-1 border-gray-400 dark:border-gray-700"></div>
                        <div class="flex justify-between my-2 text-gray-500 dark:text-gray-400">
                            <dt>Costo de envío:</dt>
                            <dd>S/. {{ number_format(7, 2) }}</dd>
                        </div>
                        <div class="border-t my-1 border-gray-400 dark:border-gray-700"></div>
                        <div class="flex justify-between my-2 text-gray-500 dark:text-gray-400">
                            <dt>IGV:</dt>
                            <dd>S/. {{ number_format($igv, 2) }}</dd>
                        </div>
                        <div class="border-t my-1 border-gray-400 dark:border-gray-700"></div>
                    </dl>
                    <div class="flex space-y-0.5 text-lg justify-between my-2 text-gray-900 dark:text-gray-200">
                        <dt>Pago Total:</dt>
                        <dd>S/. {{ number_format($subTotal + 7 + $igv, 2) }}</dd>
                    </div>
                    <div class="flex items-center justify-center">
                        <button type="submit"
                            class="lg:w-full text-center rounded-md bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 ">
                            Realizar pedido
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>