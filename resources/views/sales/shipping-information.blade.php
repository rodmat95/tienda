<div class="p-6 bg-gray-300 dark:bg-gray-800 rounded-md shadow-md">
    <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-200 mb-6">Datos de Envío</h2>

    <div class="mb-6">
        <label for="name" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">
            Información Personal
        </label>
        <div class="flex">
            <div class="w-1/2 pr-2">
                <input type="text" id="name" name="name" placeholder="Nombre de contacto"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none dark:text-gray-500 dark:bg-gray-900 focus:border-indigo-600">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="w-1/2 pl-2">
                <input type="text" id="phone" name="phone" placeholder="Número de contacto"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none dark:text-gray-500 dark:bg-gray-900 focus:border-indigo-600">
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <div class="mb-6">
        <div class="flex">
            <div class="w-1/2 pr-2">
                <label for="address" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">
                    Dirección
                </label>
                <input type="text" id="address" name="address" placeholder="Calle, Número, Colonia"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none dark:text-gray-500 dark:bg-gray-900 focus:border-indigo-600">
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="w-1/2 pl-2">
                <label for="postcode" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">
                    Código Postal
                </label>
                <input type="text" id="postcode" name="postcode" placeholder="Código Postal"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none dark:text-gray-500 dark:bg-gray-900 focus:border-indigo-600">
                @error('postcode')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <div class="mb-6">
        <div class="flex">
            <div class="w-1/3 pr-2">
                <label for="department" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">
                    Departamento
                </label>
                <select id="department" name="department"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none dark:text-gray-500 dark:bg-gray-900 focus:border-indigo-600">
                    <option value="" disabled selected>Departamento</option>
                    @foreach ($department as $dept)
                        <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                    @endforeach
                </select>
                @error('department')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="w-1/3 px-2">
                <label for="province" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">
                    Provincia
                </label>
                <select id="province" name="province"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none dark:text-gray-500 dark:bg-gray-900 focus:border-indigo-600">
                    <option value="" disabled selected>Provincia</option>
                </select>
                @error('province')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="w-1/3 pl-2">
                <label for="district" class="block text-gray-700 dark:text-gray-400 text-sm font-bold mb-2">
                    Distrito
                </label>
                <input type="text" id="district" name="district" placeholder="Distrito"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none dark:text-gray-500 dark:bg-gray-900 focus:border-indigo-600">
                @error('district')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#department').change(function () {
            var departmentId = $(this).val();
            // Limpiar las opciones actuales
            $('#province').empty().append('<option value="" disabled selected>Provincia</option>');
            $('#district').empty().append('<option value="" disabled selected>Distrito</option>');
            // Obtener provincias basadas en el departamento seleccionado
            if (departmentId) {
                $.ajax({
                    url: '/sales/getProvinces/' + departmentId,
                    type: 'GET',
                    success: function (data) {
                        $.each(data, function (key, value) {
                            $('#province').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            }
        });

        $('#province').change(function () {
            var provinceId = $(this).val();
            // Obtener distritos basados en la provincia seleccionada
            if (provinceId) {
                $.ajax({
                    url: '/sales.index/' + provinceId,  // Reemplaza esto con la ruta real en tu aplicación
                    type: 'GET',
                    success: function (data) {
                        $.each(data, function (key, value) {
                            $('#district').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            }
        });
    });
</script>