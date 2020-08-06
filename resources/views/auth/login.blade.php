@extends('layouts.auth', ['title' => 'Login'])

@section('auth-content')
        <h1 class="font-semibold text-primary-500 text-xl text-center mb-6">Login</h1>

        <form action="{{ route('auth.login') }}" method="POST">
            @csrf

            <label for="email" class="block">Email</label>
            <input
                type="email"
                name="email"
                id="email"
                class="border-b-2 py-2 border-primary-500 w-full block outline-none text-primary-500 mb-8 focus:border-primary-700 @error('email') border-red-500 @enderror"
                autocomplete="email"
                value="{{ old('email') }}"
            >

            <label for="password" class="block">Password</label>
            <input
                type="password"
                name="password"
                id="password"
                class="border-b-2 py-2 border-primary-500 w-full block outline-none text-primary-500 mb-8 focus:border-primary-700 @error('password') border-red-500 @enderror"
                autocomplete="current-password"
            >

            <div>
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" class="pl-1">Remember Me</label>
            </div>

            @if (!$errors->isEmpty())
                <div class="bg-red-500 p-4 w-full text-white flex flex-col space-y-2">
                    @error('email')
                        <p><b>Email:</b> {{ $message }}</p>
                    @enderror
                    @error('password')
                        <p><b>Password:</b> {{ $message }}</p>
                    @enderror
                </div>
            @endif

            <div class="mt-6 flex items-center space-x-4">
                <button class="inline-block text-white bg-primary-500 py-3 px-4 rounded hover:bg-primary-600 transition duration-200 outline-none focus:bg-primary-600 focus:outline-none">Login</button>
                <a href="{{ route('auth.password.request') }}" class="italic underline hover:text-primary-500 transition duration-200">Forgot your password?</a>
            </div>
        </form>
@endsection
