<ul class="text-gray-600 text-sm leading-relaxed">
    @forelse($mangas as $manga)
        <li class="hover:text-gray-900">
            <a href="{{ route('mangas.detail', ['manga' => $manga->slug]) }}">
                {{ $manga->name }}</a></li>
    @empty
        <li>No manga registered</li>
    @endforelse
</ul>
