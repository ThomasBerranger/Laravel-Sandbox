@if(session()->has('success'))
    <div class="fixed bottom-0 right-0 px-4 py-2 m-5 bg-red-500 text-white rounded">{{ session('success') }}</div>
@endif
