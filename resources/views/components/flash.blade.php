{{-- generating a success flash message --}}
@if (session()->has('success'))
    <div class="fixed bo bottom-3 right-4 bg-blue-500 p-3 text-white px-4 py-2 rounded-xl">
        <p>{{ session('success') }}</p>
    </div>
@endif
