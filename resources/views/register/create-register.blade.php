<x-layout>
    <section class="px-6 py-8">
        <main class='max-w-lg mx-auto bg-gray-100 border border-gray-200 rounded-xl p-6 mt-10'>
            <h1 class="text-center font-bold text-xl">Register!</h1>

            <form method="POST" action="/register" class="mt-10">
                {{-- unique CSRF token; used to verify that the authenticated user is the person actually making the requests to the applications and not anyone else :eyes:  --}}
                @csrf

                <div class="mb-6">
                    {{-- Name --}}
                    <label class='block mb-2 uppercase font-bold text-xs text-gray-700' for="name">
                        Name
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="name" id="name" value="{{ old('name') }}" required >

                    @error('name')
                        <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    {{-- Username --}}
                    <label class='block mb-2 uppercase font-bold text-xs text-gray-700' for="username">
                        Username
                    </label>

                    <input class="border border-gray-400 p-2 w-full" type="text" name="username" id="username" value="{{ old('username') }}" required />

                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

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
                    <button type="submit" class='bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500'>Submit</button>
                </div>

                {{-- Displays error messages at bottom of container --}}
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class='text-red-500 text-xs'>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </main>
    </section>
</x-layout>
