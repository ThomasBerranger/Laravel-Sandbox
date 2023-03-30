<div class="col">
    <label for="{{ $name }}"
           class="block text-sm font-medium leading-6 text-gray-900">{{ ucfirst($name) }}</label>

    <select id="{{ $name }}" name="{{ $name }}_id"
            class="block w-full mt-2 rounded border-0 py-1.5 text-gray-800 shadow-sm sm:text-sm">
        @foreach($collection as $object)
            <option
                {{ old($name . '_id') == $object->id ? 'selected' : '' }} value="{{ $object->id }}">{{ $object->name }}</option>
        @endforeach
    </select>
</div>
