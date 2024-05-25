<x-app-layout>
    <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
        <header class="text-center">
            <h1 class="text-xl font-bold text-gray-900 dark:text-white sm:text-3xl">Mi Carrito</h1>
        </header>
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="mt-8 lg:col-span-2">
                <ul class="space-y-4">
                    @forelse ($cartItems as $item)
                        <x-card-item :item="$item" />
                    @empty
                        <h2 class="font-semibold text-xl mb-2 text-gray-800 dark:text-gray-200">
                            ¡Hay un carrito que llenar!
                        </h2>
                        <p class="text-gray-800 dark:text-gray-200">Actualmente no tienes ningún producto en tu carrito de compras.</p>
                    @endforelse
                </ul>
            </div>

            <div class="mt-8 flex justify-end pt-8 h-80">
                <div class="w-screen max-w-lg space-y-4 p-5 rounded-md bg-gray-200 dark:bg-gray-800">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-200 sm:text-ms">Resumen del pedido</h3>
                    <dl class="space-y-0.5 text-sm text-gray-700">
                        <div class="flex justify-between my-2 text-gray-500 dark:text-gray-400">
                            <dt>Subtotal</dt>
                            <dd>S/. {{ number_format($subTotal, 2) }}</dd>
                        </div>
                        <div class="border-t my-1 border-gray-400 dark:border-gray-700"></div>
                        <div class="flex justify-between my-2 text-gray-500 dark:text-gray-400">
                            <dt>Estimado de envío</dt>
                            <dd>S/. {{ number_format(7, 2) }}</dd>
                        </div>
                        <div class="border-t my-1 border-gray-400 dark:border-gray-700"></div>
                        <div class="flex justify-between my-2 text-gray-500 dark:text-gray-400">
                            <dt>IGV estimado</dt>
                            <dd>S/. {{ number_format($igv, 2) }}</dd>
                        </div>
                        <div class="border-t my-1 border-gray-400 dark:border-gray-700"></div>
                    </dl>
                    <div class="flex space-y-0.5 text-lg justify-between my-2 text-gray-900 dark:text-gray-200">
                        <dt>Total</dt>
                        <dd>S/. {{ number_format($subTotal + 7 + $igv, 2) }}</dd>
                    </div>
                    <div class="flex items-center justify-center">
                        <a href="@if(count($cartItems) > 0){{ route('sales.index') }}@endif"
                            class="lg:w-full text-center rounded-md bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 ">
                            Finalizar compra
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>