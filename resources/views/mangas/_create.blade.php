<form method="post" action="{{ route('mangas.create') }}">
    @csrf

    <div class="mt-5 grid grid-cols-1 gap-y-4">
        <div class="col">
            <x-form.input name="name"/>
        </div>

        <div class="col">
            <x-form.select name="category" :collection="$categories"/>
        </div>

        @error('name')
        <div class="col mt-2">
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
