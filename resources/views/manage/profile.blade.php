@extends('layouts.manage', ['title' => 'Your Profile'])

@section('content')
    <h1 class="text-primary-500 text-2xl mb-6">Your Profile</h1>

    <p class="mb-3"><b>Name:</b> {{ Auth::user()->name }}</p>
    <p class="mb-3"><b>Email:</b> {{ Auth::user()->email }}</p>
    <p class="mb-3"><b>Created at:</b> {{ Auth::user()->created_at->toDateTimeString() }}</p>

    <h2 class="text-lg font-semibold mt-6 mb-2 text-primary-500">Change Password</h2>

    <form action="{{ route('manage.profile') }}" method="POST">
        @csrf

        <label for="password" class="block">Password</label>
        <input
            type="password"
            name="password"
            id="password"
            class="mt-2 border-b-2 py-2 border-primary-500 w-full block outline-none text-primary-500 mb-4 focus:border-primary-700 @error('password') border-red-500 @enderror"
            autocomplete="new-password"
        >

        @if (!$errors->isEmpty())
            <div class="bg-red-500 p-4 w-full text-white flex flex-col space-y-2">
                @error('password')
                    <p><b>Password:</b> {{ $message }}</p>
                @enderror
            </div>
        @endif

        <button class="inline-block text-white bg-primary-500 py-3 px-4 rounded hover:bg-primary-600 transition duration-200 outline-none focus:bg-primary-600 focus:outline-none">Reset your Password</button>
    </form>
@endsection
