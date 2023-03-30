@extends('layout')

@section('content')
    <div class="mt-16">
        <div class="grid grid-cols-1 gap-6 lg:gap-8">

            <div class="flex flex-wrap p-6 bg-white rounded-lg shadow-2xl shadow-gray-500/20">
                @if($character->picture)
                    <div class="w-full md:w-auto">
                        <img class="h-24 rounded object-cover mx-auto"
                             src="{{ asset('storage/' . $character->picture) }}"
                             alt="{{ $character->name }} picture">
                    </div>
                @endif

                <div class="mx-3">
                    <div class="flex flex-wrap">
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-white mr-1">{{ $character->name }}</h2>

                        @if($character->manga)
                            <p class="text-sm text-gray-800">
                                from the {{ strtolower($character->manga->category->name) }} manga
                                <a class="text-lg text-black"
                                   href="{{ route('mangas.detail', ['manga' => $character->manga]) }}">{{ $character->manga->name }}</a>
                            </p>
                        @endif
                    </div>

                    <p class="{{ $character->super_power ? 'text-green-500' : 'text-red-500' }}">Super power</p>
                </div>
            </div>

            @if(auth()->user())
                <form action="{{ route('characters.update', $character) }}" method="post" enctype="multipart/form-data"
                      class="flex p-6 bg-white rounded-lg shadow-2xl shadow-gray-500/20">
                    @csrf
                    @method('PATCH')

                    <div class="mt-2 flex flex-wrap w-full">
                        <input type="hidden" name="id" value="{{ $character->id }}">
                        <input type="text" name="name" id="name" value="{{ $character->name }}"
                               class="block flex-initial  w-full sm:w-1/2 rounded border-0 py-1.5 px-1 mb-4 text-gray-800 shadow-sm">
                        <select name="manga_id" id="manga" class=" w-full sm:w-1/2 rounded text-gray-800 mb-4">
                            @foreach($mangas as $manga)
                                <option
                                    value="{{ $manga->id }}" {{ $character->manga->id === $manga->id ? 'selected' : '' }}>{{ $manga->name }}</option>
                            @endforeach
                        </select>
                        <div class="flex items-center my-4  w-full sm:w-1/2">
                            <input type="checkbox" name="super_power" id="super_power" value="1"
                                   {{ $character->super_power ? 'checked' : '' }}
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="super_power" class="ml-1 block text-sm font-medium leading-6 text-gray-900">Super
                                power</label>
                        </div>
                        <div class=" w-full sm:w-1/2 my-4">
                            <input type="file" name="picture" id="picture" class="rounded"/>
                        </div>
                        <div class="w-full text-center">
                            <button class="bg-red-500 text-white w-2/5 rounded py-1">Edit</button>
                        </div>
                    </div>
                </form>
            @endif

            <div class="flex justify-between">
                <form method="post"
                      action="{{ route('characters.delete', ['character' => $character]) }}">
                    @csrf
                    @method('delete')

                    <button
                        class="bg-red-500 hover:bg-red-600 text-white p-2 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                        </svg>
                    </button>
                </form>

                <a href="{{ route('home') }}"
                   class="bg-red-500 hover:bg-red-600 text-white p-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3"/>
                    </svg>
                </a>
            </div>
        </div>

    </div>
@endsection
