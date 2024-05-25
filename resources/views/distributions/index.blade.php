<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($distributions as $distribution)
                <x-card-distribution :distribution="$distribution" />
            @empty
                <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-md p-6 text-center mx-auto mt-8">
                    <p class="text-gray-500 dark:text-gray-400">No hay productos disponibles en este momento.</p>
                </div>
            @endforelse
        </div>
        <div class="mt-4">
            {{ $distributions->links() }}
        </div>
    </div>
</x-app-layout>