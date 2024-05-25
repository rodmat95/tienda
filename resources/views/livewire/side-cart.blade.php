<div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <!--
        Background backdrop, show/hide based on slide-over state.
    
        Entering: "ease-in-out duration-500"
            From: "opacity-0"
            To: "opacity-100"
        Leaving: "ease-in-out duration-500"
            From: "opacity-100"
            To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                <!--
                    Slide-over panel, show/hide based on slide-over state.
        
                    Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                        From: "translate-x-full"
                        To: "translate-x-0"
                    Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                        From: "translate-x-0"
                        To: "translate-x-full"
                -->
                <div class="pointer-events-auto w-screen max-w-md">
                    <div class="flex h-full flex-col overflow-y-scroll bg-gray-100 dark:bg-gray-900 shadow-xl">
                        <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                            <div class="flex items-start justify-between">
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-300" id="slide-over-title">Mi carrito de compras
                                </h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button" wire:click="closeCart"></button>
                                    <a href="{{ route('distributions.index') }}"
                                        class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                        <span class="absolute -inset-0.5"></span>
                                        <span class="sr-only">Close panel</span>
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </a>
                                </div>
                            </div>

                            <div class="mt-8">
                                <div class="flow-root">
                                    <ul role="list" class="-mt-6 divide-gray-200 dark:divide-gray-700">
                                        <!-- products... -->
                                        <li class="flex p-3 mb-2 bg-white dark:bg-gray-800 rounded-xl">
                                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg"
                                                    alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                                    class="h-full w-full object-cover object-center">
                                            </div>
                                        
                                            <div class="ml-4 flex flex-1 flex-col">
                                                <div>
                                                    <div class="flex justify-between text-base font-medium">
                                                        <h3 class="text-gray-900 dark:text-gray-300">
                                                            <a href="#"
                                                                class="hover:text-indigo-500 dark:hover:text-indigo-300">
                                                                Riñonera Salmon
                                                            </a>
                                                        </h3>
                                                        <p class="ml-4 text-gray-500 dark:text-gray-400">
                                                            S/. 32.00
                                                        </p>
                                                    </div>
                                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Categoria</p>
                                                </div>
                                                <div class="flex flex-1 items-end justify-between text-sm">
                                                    <p class="text-gray-500 dark:text-gray-400">Cantidad: 1</p>
                                        
                                                    <div class="flex">
                                                        <button type="button"
                                                            class="font-medium text-gray-500 dark:text-gray-400 hover:text-indigo-500 dark:hover:text-indigo-300">Eliminar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="flex p-3 mb-4 bg-white dark:bg-gray-800 rounded-xl">
                                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg"
                                                    alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt."
                                                    class="h-full w-full object-cover object-center">
                                            </div>
                                        
                                            <div class="ml-4 flex flex-1 flex-col">
                                                <div>
                                                    <div class="flex justify-between text-base font-medium text-gray-500 dark:text-gray-400">
                                                        <h3>
                                                            <a href="#"
                                                                class="hover:text-indigo-500 dark:hover:text-indigo-300">
                                                                Cartera Azul
                                                            </a>
                                                        </h3>
                                                        <p class="ml-4 text-gray-500 dark:text-gray-400">
                                                            S/. 90.00
                                                        </p>
                                                    </div>
                                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Categoria</p>
                                                </div>
                                                <div class="flex flex-1 items-end justify-between text-sm">
                                                    <p class="text-gray-500 dark:text-gray-400">Cantidad: 1</p>
                                        
                                                    <div class="flex">
                                                        <button type="button"
                                                            class="font-medium text-gray-500 dark:text-gray-400 hover:text-indigo-500 dark:hover:text-indigo-300">Eliminar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900 dark:text-gray-300">
                                <p>Subtotal</p>
                                <p>S/. 122</p>
                            </div>
                            <p class="mt-0.5 text-sm text-gray-500">Envío e impuestos calculados al finalizar la compra.</p>
                            <div class="mt-6">
                                <a href="#" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Ir a pagar</a>
                            </div>
                            <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                <p>
                                    O
                                    <button type="button"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">
                                        Continuar Comprando
                                        <span aria-hidden="true"> &rarr;</span>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>