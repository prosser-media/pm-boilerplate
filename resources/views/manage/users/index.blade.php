@extends('layouts.manage', ['title' => 'Users'])

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-primary-500 text-2xl">Users</h1>
        <div>
            <a href="{{ route('manage.users.create') }}" class="bg-primary-500 text-white py-3 px-4 shadow-lg transtion duration-100 hover:bg-primary-400 focus:outline-none focus:bg-primary-400">Create User</a>
        </div>
    </div>

    <table class="table-auto w-full">
        <thead>
            <tr class="border-b">
                <th class="pr-2 py-2 text-left">Name</th>
                <th class="p-2 text-left">Email</th>
                <th class="p-2 text-left">Created at</th>
                <th class="p-2 text-left"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="border-b">
                    <td class="pr-2 py-3 text-left">{{ $user->name }}</td>
                    <td class="px-2 py-3 text-left">{{ $user->email }}</td>
                    <td class="px-2 py-3 text-left">{{ $user->created_at->toDateTimeString() }}</td>
                    <td class="px-2 py-3 flex space-x-4">
                        <a href="{{ route('manage.users.edit', $user->id) }}" class="bg-primary-500 px-3 py-2 text-white shadow-lg transition duration-200 hover:bg-primary-400 focus:outline-none focus:bg-primary-400">Edit</a>
                        <form action="{{ route('manage.users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')

                            <button class="bg-red-500 px-3 py-2 text-white shadow-lg transition duration-200 hover:bg-red-400 focus:outline-none focus:bg-red-400">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
