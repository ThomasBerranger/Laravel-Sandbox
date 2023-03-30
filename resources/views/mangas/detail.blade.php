@extends('layout')

@section('content')
    <div class="mt-16">
        <div class="grid grid-cols-1 gap-6 lg:gap-8">

            <div
                class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class="relative min-w-full">
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-white">{{ $manga->name }}
                        : {{ $manga->category->name }}</h2>

                    @if($relatedCharactersNumber)
                        <p class="text-gray-500 text-xs">{{ $relatedCharactersNumber }} related
                            character{{ $relatedCharactersNumber > 1 ? 's' : '' }}</p>
                    @endif

                    <br>

                    <ul class="text-md">
                        @forelse($manga->characters as $character)
                            <li>
                                <a href="{{ route('characters.detail', ['character' => $character]) }}">{{ $character->name }}</a>
                            </li>
                        @empty
                            No related character registered
                        @endforelse
                    </ul>

                    <div class="flex justify-between mt-5">
                        <form method="post" action="{{ route('mangas.delete', ['manga' => $manga]) }}">
                            @csrf
                            @method('delete')
                            <button class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm">Remove</button>
                        </form>
                        <a href="{{ route('home') }}"
                           class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm">Home</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
