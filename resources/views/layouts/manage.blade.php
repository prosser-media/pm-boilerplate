<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ucfirst($title ?? '' ?? '') }}{{ $title ?? '' ? ' | ' : '' }} Management - {{ config('app.title', 'PM Boilerblate') }}</title>

    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('head')
</head>
<body class="antialiased leading-none text-gray-800 font-sans">
    <div id="app" x-data="{ sidebar: false }">
        <header class="flex shadow-lg">
            <div class="flex justify-between w-full">
                <div class="pl-6 py-4">
                    <h4 class="uppercase text-gray-600 text-sm">Prosser Media</h4>
                    <h3 class="text-primary-500 text-xl font-semibold">PM Boilerplate</h3>
                </div>
                <div class="flex">
                    <div class="relative flex" x-data="{ profile: false }">
                        <button class="px-6 py-4 block hover:bg-gray-100 transition duration-100 focus:outline-none focus:bg-gray-100" @click="profile = !profile">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.12104 17.8037C7.15267 16.6554 9.4998 16 12 16C14.5002 16 16.8473 16.6554 18.879 17.8037M15 10C15 11.6569 13.6569 13 12 13C10.3431 13 9 11.6569 9 10C9 8.34315 10.3431 7 12 7C13.6569 7 15 8.34315 15 10ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"/></svg>
                        </button>
                        <div class="absolute bg-white shadow-lg w-48 right-0" style="top: 65px" @click.away="profile = false" x-show="profile">
                            <a href="/" class="flex items-center space-x-2 py-3 px-4 transition duration-100 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 ">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.05493 11H5C6.10457 11 7 11.8954 7 13V14C7 15.1046 7.89543 16 9 16C10.1046 16 11 16.8954 11 18V20.9451M8 3.93552V5.5C8 6.88071 9.11929 8 10.5 8H11C12.1046 8 13 8.89543 13 10C13 11.1046 13.8954 12 15 12C16.1046 12 17 11.1046 17 10C17 8.89543 17.8954 8 19 8L20.0645 8M15 20.4879V18C15 16.8954 15.8954 16 17 16H20.0645M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"/></svg>
                                <span>Main Website</span>
                            </a>
                            <a href="{{ route('manage.profile') }}" class="flex items-center space-x-2 py-3 px-4 transition duration-100 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.12104 17.8037C7.15267 16.6554 9.4998 16 12 16C14.5002 16 16.8473 16.6554 18.879 17.8037M15 10C15 11.6569 13.6569 13 12 13C10.3431 13 9 11.6569 9 10C9 8.34315 10.3431 7 12 7C13.6569 7 15 8.34315 15 10ZM21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"/></svg>
                                <span>Profile</span>
                            </a>
                            <a href="{{ route('auth.logout') }}" class="flex items-center space-x-2 py-3 px-4 transition duration-100 hover:bg-gray-100 border-t border-gray-500 focus:outline-none focus:bg-gray-100">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16L7 12M7 12L11 8M7 12L21 12M16 16V17C16 18.6569 14.6569 20 13 20H6C4.34315 20 3 18.6569 3 17V7C3 5.34315 4.34315 4 6 4H13C14.6569 4 16 5.34315 16 7V8"/></svg>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                    <button class="px-6 py-4 block hover:bg-gray-100 transition duration-100 lg:hidden focus:outline-none focus:bg-gray-100 " @click="sidebar = !sidebar">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6H20M4 12H20M4 18H20"/></svg>
                    </button>
                </div>
            </div>
        </header>

        <main class="flex w-screen" style="height: calc(100vh - 66px)">
            <nav class="fixed h-screen w-64 bg-white shadow-lg py-4 left-0 top-0 lg:static overflow-scroll important:lg:block" @click.away="sidebar = false" x-show="sidebar">
                <a href="{{ route('manage.dashboard') }}" class="flex items-center space-x-2 py-4 px-4 transition duration-100 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 {{ Nav::isRoute('manage.dashboard', 'text-primary-500') }}">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12L5 10M5 10L12 3L19 10M5 10V20C5 20.5523 5.44772 21 6 21H9M19 10L21 12M19 10V20C19 20.5523 18.5523 21 18 21H15M9 21C9.55228 21 10 20.5523 10 20V16C10 15.4477 10.4477 15 11 15H13C13.5523 15 14 15.4477 14 16V20C14 20.5523 14.4477 21 15 21M9 21H15"/></svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('manage.users.index') }}" class="flex items-center space-x-2 py-4 px-4 transition duration-100 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 {{ Nav::hasSegment('users', '2', 'text-primary-500') }}">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.35418C12.7329 3.52375 13.8053 3 15 3C17.2091 3 19 4.79086 19 7C19 9.20914 17.2091 11 15 11C13.8053 11 12.7329 10.4762 12 9.64582M15 21H3V20C3 16.6863 5.68629 14 9 14C12.3137 14 15 16.6863 15 20V21ZM15 21H21V20C21 16.6863 18.3137 14 15 14C13.9071 14 12.8825 14.2922 12 14.8027M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z"/></svg>
                    <span>Users</span>
                </a>
            </nav>
            <div class="flex-1 p-6">
                @yield('content')
            </div>
        </main>
    </div>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    @yield('body')
</body>
</html>
