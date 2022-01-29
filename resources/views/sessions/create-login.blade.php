<x-layout>
    <section class="px-6 py-8">
        <main class='max-w-lg mx-auto bg-gray-100 border border-gray-200 rounded-xl p-6 mt-10'>
            <h1 class="text-center font-bold text-xl">Log In!</h1>

            <form method="POST" action="/sessions" class="mt-10">
                {{-- unique CSRF token; used to verify that the authenticated user is the person actually making the requests to the applications and not anyone else :eyes:  --}}
                @csrf

                <div class="mb-6">
                    {{-- Email --}}
                    <label class='block mb-2 uppercase font-bold text-xs text-gray-700' for="email">
                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email" value="{{ old('email') }}" required />

                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    {{-- Password --}}
                    <label class='block mb-2 uppercase font-bold text-xs text-gray-700' for="password">
                        Password
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" required />

                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    {{-- Submit --}}
                    <button type="submit" class='bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500'>Log In</button>
                </div>

                @if ($errors->any())
                    @foreach ($errors as $error)
                        <p class='text-xs text-red-500'>{{ $error }}</p>
                    @endforeach
                @endif
            </form>
        </main>
    </section>
</x-layout>
