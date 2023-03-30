@extends('layout')

@section('content')
    <div class="mt-16">
        <div class="grid grid-cols-1 gap-6 lg:gap-8">

            <div
                class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class="relative min-w-full">
                    <h2 class="text-xl text-center font-semibold text-gray-900 mb-3">Login</h2>

                    <form method="post" action="{{ route('login') }}"
                          class="grid xs:grid-cols-1 sm:grid-cols-2">
                        @csrf

                        <div class="flex p-2">
                            <label for="email" class="mr-3">Email</label>
                            <input type="email" name="email"
                                   class="block w-full px-1 border-2 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6
                            @error('email') border-red-500 @enderror
                            " value="{{ old('email') }}">
                        </div>
                        <div class="flex p-2">
                            <label for="password" class="mr-3">Password</label>
                            <input type="password" name="password"
                                   class="block w-full px-1 border-2 rounded-md py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>

                        @error('email')
                            <div class="sm:col-span-12">
                                <p class="text-xs text-red-500 text-center">{{ $message }}</p>
                            </div>
                        @enderror

                        <div class="flex justify-center items-center sm:col-span-2 mt-3">
                            <button type="submit"
                                    class="bg-red-500 hover:bg-red-600 text-white rounded text-sm w-1/2 py-1">Login
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
