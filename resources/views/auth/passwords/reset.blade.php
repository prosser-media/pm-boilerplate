@extends('layouts.auth', ['title' => 'Reset your Password'])

@section('auth-content')
<h1 class="font-semibold text-primary-500 text-xl text-center mb-6">Reset your Password</h1>

<form action="{{ route('auth.password.reset') }}" method="POST">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

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

    <div class="mt-6 flex items-center space-x-4">
        <button class="inline-block text-white bg-primary-500 py-3 px-4 rounded hover:bg-primary-600 transition duration-200 outline-none focus:bg-primary-600 focus:outline-none">Reset Password</button>
    </div>
</form>
@endsection
