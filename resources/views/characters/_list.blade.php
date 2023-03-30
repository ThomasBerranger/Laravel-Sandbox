<ul class="text-gray-600 text-sm leading-relaxed">
    @forelse($characters as $character)
        <li class="hover:text-gray-900">
            <a href="{{ route('characters.detail', ['character' => $character->slug]) }}">{{ $character->name }}</a>
        </li>
    @empty
        <li>No character registered</li>
    @endforelse
</ul>
