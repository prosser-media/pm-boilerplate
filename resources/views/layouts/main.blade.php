<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ucfirst($title ?? '' ?? '') }}{{ $title ?? '' ? ' | ' : '' }}{{ config('app.title', 'PM Boilerblate') }}</title>

    {{-- Styles --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('head')
</head>
<body class="antialiased leading-none text-gray-800 font-sans">
    <div id="app" style="min-height: calc(100vh - 80px);">
        <header class="bg-primary-500 text-white" x-data="{ isOpen: false }">
            <div class="container mx-auto flex lg:justify-between flex-col lg:flex-row">
                <div class="flex justify-between w-full lg:w-auto">
                    <h2 class="font-semibold text-xl py-4 pl-4">{{ config('app.title', 'PM Boilerplate') }}</h2>
                    <button class="text-white hover:text-gray-200 block p-4 lg:hidden" @click="isOpen = !isOpen" x-show="!isOpen">
                        <svg class="stroke-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" height="48" width="48" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                    </button>
                    <button class="text-white hover:text-gray-200 block p-4 lg:hidden" @click="isOpen = !isOpen" x-show="isOpen">
                        <svg class="stroke-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="flex flex-col lg:flex-row lg:pr-4 pb-4 lg:pb-0 important:lg:flex" x-show="isOpen" @click.away="isOpen = false">
                    <a href="{{ route('pages.home') }}" class="block px-4 py-3 hover:bg-primary-600 transition-colors duration-200 lg:py-4 outline-none focus:bg-primary-600 focus:outline-none">Home</a>
                    <a href="#" class="block px-4 py-3 hover:bg-primary-600 transition-colors duration-200 lg:py-4 outline-none focus:bg-primary-600 focus:outline-none">About</a>
                    <a href="#" class="block px-4 py-3 hover:bg-primary-600 transition-colors duration-200 lg:py-4 outline-none focus:bg-primary-600 focus:outline-none">Get in Touch</a>
                    @guest
                        <a href="{{ route('auth.login') }}" class="block px-4 py-3 hover:bg-primary-600 transition-colors duration-200 lg:py-4 outline-none focus:bg-primary-600 focus:outline-none">Login</a>
                    @endguest

                    @auth
                        <a href="{{ route('auth.logout') }}" class="block px-4 py-3 hover:bg-primary-600 transition-colors duration-200 lg:py-4 outline-none focus:bg-primary-600 focus:outline-none">Logout</a>
                    @endauth
                </div>
            </div>
        </header>
        <main>
            @yield('content')
        </main>
    </div>

    <footer class="bg-gray-800 py-8 text-white">
        <div class="container mx-auto px-4">
            <p class="text-center">Copyright &copy; {{ config('app.copyright', 'Prosser Media') }} {{ date('Y') }}</p>
        </div>
    </footer>

    {{-- Scripts --}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    @yield('body')
</body>
</html>
