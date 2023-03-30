<form method="post" action="{{ route('characters.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mt-5 grid grid-cols-1 gap-x-3">
        <div class="col">
            <x-form.input name="name"/>
        </div>

        <div class="col">
            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Picture</label>
            <input type="file" name="picture" id="picture" class="rounded" required>
        </div>

        <div class="col">
            <div class="flex items-center mt-4 mb-2">
                <input type="checkbox" name="super_power" id="super_power" value="1"
                       {{ old('super_power') ? 'checked' : '' }}
                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="super_power" class="ml-1 block text-sm font-medium leading-6 text-gray-900">Super
                    power</label>
            </div>
        </div>

        <div class="col">
            <x-form.select name="manga" :collection="$mangas"/>
        </div>

        @error('name', 'createCharacter')
        <div class="col mt-5">
            <p class="text-xs text-red-500 text-center">{{ $message }}</p>
        </div>
        @enderror
    </div>

    <div class="mt-6 flex justify-center">
        <button type="submit"
                class="bg-red-500 hover:bg-red-600 text-white py-1 px-10 rounded text-sm">Save
        </button>
    </div>
</form>
