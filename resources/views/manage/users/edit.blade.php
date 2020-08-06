@extends('layouts.manage', ['title' => 'Edit User'])

@section('content')
    <h1 class="text-primary-500 text-2xl mb-6">Edit User</h1>

    <form action="{{ route('manage.users.update', $user->id) }}" method="POST">
        @csrf

        <label for="name" class="block">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            class="border-b-2 py-2 border-primary-500 w-full block outline-none text-primary-500 mb-8 focus:border-primary-700 @error('name') border-red-500 @enderror"
            autocomplete="off"
            value="{{ old('name') ?? $user->name }}"
        >

        <label for="email" class="block">Email</label>
        <input
            type="email"
            name="email"
            id="email"
            class="border-b-2 py-2 border-primary-500 w-full block outline-none text-primary-500 mb-8 focus:border-primary-700 @error('email') border-red-500 @enderror"
            autocomplete="off"
            value="{{ old('email') ?? $user->email }}"
        >

        <label for="password" class="block">Password</label>
        <input
            type="password"
            name="password"
            id="password"
            class="border-b-2 py-2 border-primary-500 w-full block outline-none text-primary-500 mb-1 focus:border-primary-700 @error('password') border-red-500 @enderror"
            autocomplete="new-password"
        >
        <p class="text-sm mb-8">Leave blank to keep the same.</p>

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

        <button class="mt-6 inline-block text-white bg-primary-500 py-3 px-4 rounded hover:bg-primary-600 transition duration-200 outline-none focus:bg-primary-600 focus:outline-none">Update User</button>
    </form>
@endsection
