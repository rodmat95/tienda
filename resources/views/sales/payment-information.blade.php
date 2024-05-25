<div class="mt-10 p-6 dark:bg-gray-800 rounded-md shadow-md">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-200 mb-6">Información de Pago</h2>
    <div class="flex mb-6">
        <div class="w-1/2 pr-2">
            <label for="card-number" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Número de
                Tarjeta</label>
            <input type="text" id="card-number" name="card-number" placeholder="**** **** **** ****"
                class="w-full px-4 py-2 border rounded-md focus:outline-none dark:text-gray-500 dark:bg-gray-900 focus:border-indigo-600">
            @error('card-number')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="w-1/2 pl-2">
            <label for="name" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Nombre del
                titular
                de la tarjeta</label>
            <input type="text" id="name" name="name" placeholder="Nombre completo"
                class="w-full px-4 py-2 border rounded-md focus:outline-none dark:text-gray-500 dark:bg-gray-900 focus:border-indigo-600">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="flex mb-6">
        <div class="w-1/2 pr-2">
            <label for="expiration-date" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">Fecha
                deVencimiento</label>
            <div class="flex items-center">
                <input type="text" id="month" name="month" placeholder="MM"
                    class="w-1/2 px-4 py-2 border rounded-md focus:outline-none dark:text-gray-500 dark:bg-gray-900 focus:border-indigo-600">
                @error('month')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <small class="mx-2 text-gray-700 dark:text-gray-400">/</small>
                <input type="text" id="year" name="year" placeholder="YY"
                    class="w-1/2 px-4 py-2 border rounded-md focus:outline-none dark:text-gray-500 dark:bg-gray-900 focus:border-indigo-600">
                @error('year')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="w-1/2 pl-2">
            <label for="cvv" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="***"
                class="w-full px-4 py-2 border rounded-md focus:outline-none dark:text-gray-500 dark:bg-gray-900 focus:border-indigo-600">
            @error('cvv')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>