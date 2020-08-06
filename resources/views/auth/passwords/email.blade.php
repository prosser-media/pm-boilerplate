@extends('layouts.auth', ['title' => 'Reset Password'])

@section('auth-content')
<h1 class="font-semibold text-primary-500 text-xl text-center mb-6">Reset your Password</h1>

<form action="{{ route('auth.password.email') }}" method="POST">
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

    <div class="mt-6 flex items-center space-x-4">
        <button class="inline-block text-white bg-primary-500 py-3 px-4 rounded hover:bg-primary-600 transition duration-200 outline-none focus:bg-primary-600 focus:outline-none">Send Reset Link</button>
    </div>
</form>
@endsection
