@extends('layouts.auth', ['title' => 'Register'])

@section('auth-content')
<h1 class="font-semibold text-primary-500 text-xl text-center mb-6">Register</h1>

<form action="{{ route('auth.register') }}" method="POST">
    @csrf

    <label for="name" class="block">Name</label>
    <input
        type="text"
        name="name"
        id="name"
        class="border-b-2 py-2 border-primary-500 w-full block outline-none text-primary-500 mb-8 focus:border-primary-700 @error('name') border-red-500 @enderror"
        autocomplete="name"
        value="{{ old('name') }}"
    >

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
        autocomplete="new-password"
    >

    <label for="password-confirm" class="block">Confirm Password</label>
    <input
        type="password"
        name="password_confirmation"
        id="password-confirm"
        class="border-b-2 py-2 border-primary-500 w-full block outline-none text-primary-500 mb-8 focus:border-primary-700 @error('password-confirm') border-red-500 @enderror"
        autocomplete="new-password"
    >

    @if (!$errors->isEmpty())
        <div class="bg-red-500 p-4 w-full text-white flex flex-col space-y-2">
            @error('name')
                <p><b>Name:</b> {{ $message }}</p>
            @enderror
            @error('email')
                <p><b>Email:</b> {{ $message }}</p>
            @enderror
            @error('password')
                <p><b>Password:</b> {{ $message }}</p>
            @enderror
        </div>
    @endif

    <div class="mt-6 flex items-center space-x-4">
        <button class="inline-block text-white bg-primary-500 py-3 px-4 rounded hover:bg-primary-600 transition duration-200 outline-none focus:bg-primary-600 focus:outline-none">Register</button>
        <a href="{{ route('auth.login') }}" class="italic underline hover:text-primary-500 transition duration-200">Already have an account?</a>
    </div>
</form>
@endsection
