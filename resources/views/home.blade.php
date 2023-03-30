@extends('layout')

@section('content')
    <div class="mt-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

            <div
                class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl">
                <div>
                    <div class="flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                        </svg>
                        <h2 class="text-xl font-semibold text-gray-900 ml-1">Mangas
                        </h2>
                    </div>
                    <br>

                    @include('mangas._list')

                </div>
            </div>

            <div
                class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl">
                <div>
                    <div class="flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <h2 class="text-xl font-semibold text-gray-900 ml-1">Characters</h2>
                    </div>
                    <br>

                    @include('characters._list')

                </div>
            </div>

            <div
                class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl">
                <h2 class="text-center text-xl font-semibold text-gray-900 dark:text-white">New manga</h2>

                @include('mangas._create')

            </div>

            <div
                class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl">
                <h2 class="text-center text-xl font-semibold text-gray-900 dark:text-white">New character</h2>

                @include('characters._create')

            </div>

        </div>
    </div>
@endsection
