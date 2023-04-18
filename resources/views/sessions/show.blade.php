@extends('layout')

@section('content')
    <div class="mt-16">
        <div class="grid grid-cols-1 gap-6 lg:gap-8">

            <div
                class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                <div class="relative min-w-full">
                    <h2 class="text-xl text-center font-semibold text-gray-900 mb-3">API access token</h2>

                    <table class="w-full text-center my-6">
                        <thead>
                        <tr class="font-light">
                            <th class="border border-slate-300 p-2 font-normal">Name</th>
                            <th class="border border-slate-300 p-2 font-normal">Abilities</th>
                            <th class="border border-slate-300 p-2 font-normal">Creation date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse(auth()->user()->tokens as $token)
                            <tr>
                                <td class="border border-slate-300 p-2">{{ $token->name }}</td>
                                <td class="border border-slate-300 p-2">
                                    @foreach($token->abilities as $ability)
                                        {{ $ability }}{{ !$loop->last ? ', ' : '' }}
                                    @endforeach
                                </td>
                                <td class="border border-slate-300 p-2">{{ $token->created_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="border border-slate-300 p-4 text-red-700">No token registered
                                    yet
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <form method="post" action="{{ route('tokens.create') }}"
                          class="grid sm:grid-cols-3 gap-2 justify-items-center">
                        @csrf

                        <label for="token_name" class="sm:justify-self-end">Token name</label>
                        <input type="text" name="token_name"
                               class="border-2 rounded px-2 w-3/2 sm:w-full
                                @error('token_name') border-red-500 @enderror">
                        <button type="submit"
                                class="w-32 sm:justify-self-start bg-red-500 hover:bg-red-600 text-white rounded text-sm py-1">
                            Generate
                        </button>
                    </form>

                    @if(session()->has('plainTextToken'))
                        <div class="width-full text-center mt-3">Token created : <span
                                class="text-green-600">{{ session('plainTextToken') }}</span></div>
                    @endif

                </div>
            </div>

        </div>
    </div>
@endsection
