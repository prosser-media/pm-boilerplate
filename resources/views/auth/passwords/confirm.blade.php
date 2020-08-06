@extends('layouts.auth', ['title' => 'Confirm Password'])

@section('auth-content')
<h1 class="font-semibold text-primary-500 text-xl text-center mb-6">Confirm your Password</h1>

<form action="{{ route('auth.password.confirm') }}" method="POST">
    @csrf

    <label for="password" class="block">Password</label>
    <input
        type="password"
        name="password"
        id="password"
        class="border-b-2 py-2 border-primary-500 w-full block outline-none text-primary-500 mb-8 focus:border-primary-700 @error('password') border-red-500 @enderror"
        autocomplete="current-password"
    >

    <div class="mt-6 flex items-center space-x-4">
        <button class="inline-block text-white bg-primary-500 py-3 px-4 rounded hover:bg-primary-600 transition duration-200 outline-none focus:bg-primary-600 focus:outline-none">Confirm</button>
        <a href="{{ route('auth.password.request') }}" class="italic underline hover:text-primary-500 transition duration-200">Forgot your password?</a>
    </div>
</form>
@endsection
