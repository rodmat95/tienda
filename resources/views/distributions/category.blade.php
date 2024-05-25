<x-app-layout>

    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold mb-8 text-gray-900 dark:text-white">Categoría: {{ $category->name }}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($distributions as $distribution)
                <x-card-distribution :distribution="$distribution" />
            @empty
                <div class="col-span-3 sm:col-span-3 mx-auto">
                    <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-md p-6 text-center mx-auto mt-8">
                        <p class="text-gray-500 dark:text-gray-400">No hay productos disponibles en este momento.</p>
                    </div>
                </div>
            @endforelse
        </div>
        <div class="mt-4">
            {{ $distributions->links() }}
        </div>
    </div>

</x-app-layout>
